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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable(false)->default('Transaction without description')->comment('Descrição da transação');
            $table->decimal('purchase_value')->nullable(false)->default(0)->comment('Valor de compra da transação');
            $table->decimal('sale_value')->nullable(false)->default(0)->comment('Valor de venda da transação');
            $table->decimal('result')->nullable(false)->default(0)->comment('Valor da venda - Valor da compra');
            $table->datetime('initial_date')->nullable()->default(now())->comment('Data inicial da transação');
            $table->datetime('final_date')->nullable()->default(now())->comment('Data final da transação');
            $table->string('duration')->nullable(false)->default(now())->comment('Data final - Data inicial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
