<?php

namespace App\Jobs;

use App\Services\PaymentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MercadoPagoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private PaymentService $paymentService;

    /**
     * Create a new job instance.
     */
    public function __construct(private array $request)
    {
        $this->onQueue('mercado_pago_webhook');
        $this->paymentService = new PaymentService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        switch($this->request['action']) {
            case 'payment.updated':
                $this->paymentService->update($this->request['data']['id']);
                break;
            default:
            break;
        }
    }
}
