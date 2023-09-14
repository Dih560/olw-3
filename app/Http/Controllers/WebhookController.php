<?php

namespace App\Http\Controllers;

use App\Http\Requests\MpWebhookRequest;
use App\Jobs\MercadoPagoJob;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function mercadopago(MpWebhookRequest $request)
    {
        MercadoPagoJob::dispatch($request->all());

        return response()->json('Ok');
    }
}
