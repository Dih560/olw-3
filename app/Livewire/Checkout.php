<?php

namespace App\Livewire;

use App\Enums\CheckoutStepsEnum;
use App\Exceptions\PaymentException;
use App\Livewire\Forms\AddressForm;
use App\Livewire\Forms\UserForm;
use App\Mail\OrderCreatedMail;
use App\Services\CheckoutService;
use App\Services\OrderService;
use App\Services\UserService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Checkout extends Component
{
    public array $cart = [];
    public int $step = CheckoutStepsEnum::INFORMATION->value;
    public int|null $method = null;
    public UserForm $user;
    public AddressForm $address;

    public function mount(CheckoutService $checkoutService)
    {
        $this->cart = $checkoutService->loadCart();
        $this->user->email = config('payment.mp.buyer_email');
    }

    public function findAddress()
    {
        $this->address->findAddress();
    }

    public function submitInformationStep()
    {
        $this->user->validate();
        $this->address->validate();
        $this->step = CheckoutStepsEnum::SHIPPING->value;
    }

    public function submitShippingStep()
    {
        $this->step = CheckoutStepsEnum::PAYMENT->value;
    }

    public function creditCardPayment(
        CheckoutService $checkout,
        UserService $userService,
        OrderService $orderService,
        $data
    )
    {
        try {
            $user = $this->user->all();
            $address = $this->address->all();

            $payment = $checkout->creditCardPayment($data, $user, $address);
            $user = $userService->store($user, $address);
            $order = $orderService->update($this->cart['id'], $payment, $user, $address);

            Mail::to($user->email)->queue(new OrderCreatedMail($order));
            $this->responsePayment();
        } catch (PaymentException $e) {
            $this->addError('payment', $e->getMessage());
        } catch (\Exception $e) {
            dd($e);
            $this->addError('payment', $e->getMessage());
        }
    }

    public function pixOrBankSlipPayment(
        CheckoutService $checkout,
        UserService $userService,
        OrderService $orderService,
        $data
    )
    {
        try {
            $user = $this->user->all();
            $address = $this->address->all();

            $payment = $checkout->pixOrBankSlipPayment($data, $user, $address);
            $user = $userService->store($user, $address);
            $order = $orderService->update($this->cart['id'], $payment, $user, $address);

            Mail::to($user->email)->queue(new OrderCreatedMail($order));
            $this->responsePayment();
        } catch (PaymentException $e) {
            $this->addError('payment', $e->getMessage());
        } catch (\Exception $e) {
            dd($e);
            $this->addError('payment', $e->getMessage());
        }
    }

    public function responsePayment()
    {
        $url = URL::temporarySignedRoute(
            name: 'checkout.result',
            expiration: 3600,
            parameters: [
                'order_id' => $this->cart['id']
            ]
        );

        $this->redirect($url);
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
