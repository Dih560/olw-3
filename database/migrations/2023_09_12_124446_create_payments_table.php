<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('external_id')->nullable(true);
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->integer('method'); //ENUM
            $table->integer('status'); //ENUM
            $table->integer('installments')->nullable(true);
            $table->datetime('approved_at')->nullable(true);
            $table->text('qr_code_64')->nullable(true);
            $table->text('qr_code')->nullable(true);
            $table->text('ticket_url')->nullable(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
