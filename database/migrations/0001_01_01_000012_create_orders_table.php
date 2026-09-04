<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 30)->unique();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('branch_id')->nullable();
            $table->enum('channel', ['online', 'in_store', 'whatsapp'])->default('online');
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled', 'returned'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->decimal('subtotal', 10, 3);
            $table->decimal('discount', 10, 3)->default(0.000);
            $table->decimal('vat_amount', 10, 3)->default(0.000);
            $table->decimal('shipping_cost', 10, 3)->default(0.000);
            $table->decimal('total', 10, 3);
            $table->char('currency', 3)->default('OMR');
            $table->string('coupon_code')->nullable();
            $table->foreignId('shipping_address_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
            $table->foreign('shipping_address_id')->references('id')->on('addresses')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
