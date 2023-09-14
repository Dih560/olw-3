<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentStatusEnum;
use App\Mail\PaymentApprovedMail;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use MercadoPago\Payment as MercadoPagoPayment;
use MercadoPago\SDK;

class PaymentService
{
    public function __construct() {
        //
    }

    public function update($external_id)
    {
        SDK::setAccessToken(config('payment.mp.access_token'));
        $mp_payment = MercadoPagoPayment::find_by_id($external_id);
        $payment = Payment::where('external_id', $external_id)->with('order.user')->firstOrFail();

        $payment->status = PaymentStatusEnum::parse($mp_payment->status);

        if ($payment->status === PaymentStatusEnum::PAID) {
            $payment->approved_at = $mp_payment->date_approved;
            $payment->order->status = OrderStatusEnum::PAID;
            $payment->order->save();

            Mail::to($payment->order->user->email)->queue(new PaymentApprovedMail($payment->order));
        }

        if ($payment->status === PaymentStatusEnum::CANCELLED || $payment->status === PaymentStatusEnum::REJECTED) {
            $payment->order->status = OrderStatusEnum::parse($mp_payment->status);
            $payment->order->save();
        }

        $payment->save();

        return $payment->order;
    }
}
