<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Exceptions\PaymentException;
use App\Models\Order;
use Database\Seeders\OrderSeeder;
use MercadoPago\Payment;
use MercadoPago\SDK;
use Illuminate\Support\Str;

class CheckoutService
{
    public function __construct() {
        SDK::setAccessToken(config('payment.mp.access_token'));
    }

    public function loadCart(): array
    {
        $cart = Order::with('skus.product', 'skus.features')
        ->where('status', OrderStatusEnum::CART)
        ->where(function ($query) {
            $query->where('session_id', session()->getId());

            if (auth()->check()) {
                $query->orWhere('user_id', auth()->user()->id);
            }

            return $query;
        })->first();

        if (!$cart && in_array(config('app.env'), ['local', 'testing'])) {
            $seed = new OrderSeeder();
            $seed->run(session()->getId());
            return $this->loadCart();
        }

        return $cart->toArray();
    }

    public function creditCardPayment($data, $user, $address): Payment
    {
        $payment = new Payment();
        $payment->transaction_amount = (float)$data['transaction_amount'];
        $payment->token = $data['token'];
        $payment->description = $data['description'];
        $payment->installments = (int)$data['installments'];
        $payment->payment_method_id = $data['payment_method_id'];
        $payment->issuer_id = (int)$data['issuer_id'];
        $payment->payer = $this->buildPayer($user, $address);

        $payment->save();

        throw_if(
            !$payment->id || $payment->status === 'rejected',
            PaymentException::class,
            $payment?->error?->message ?? "Verifique os dados do cartão"
        );

        return $payment;
    }

    public function pixOrBankSlipPayment($data, $user, $address): Payment
    {
        $payment = new Payment();
        $payment->transaction_amount = $data['amount'];
        $payment->description = "Título do produto";
        $payment->payment_method_id = $data['method'];
        $payment->payer = $this->buildPayer($user, $address);

        $payment->save();

        throw_if(
            !$payment->id || $payment->status === 'rejected',
            PaymentException::class,
            $payment?->error?->message ?? "Verifique os dados do cartão"
        );

        return $payment;
    }

    private function buildPayer($user, $address): array
    {
        $first_name = explode(" ", $user['name'])[0];
        $last_name = Str::of($user['name'])->after($first_name)->trim();

        return array(
            "email" => $user['email'],
            "first_name" => $first_name,
            "last_name" => $last_name,
            "identification" => array(
                "type" => "CPF",
                "number" => $user['cpf']
            ),
            "address"=>  array(
                "zip_code" => $address['zipcode'],
                "street_name" => $address['address'],
                "street_number" => $address['number'],
                "neighborhood" => $address['district'],
                "city" => $address['city'],
                "federal_unit" => $address['state']
            )
        );
    }
}
