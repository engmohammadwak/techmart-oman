<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('order_item_id');
            $table->string('reason');
            $table->text('description')->nullable();
            $table->json('photos')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->enum('refund_method', ['original', 'wallet', 'store_credit'])->nullable();
            $table->decimal('refund_amount', 10, 3)->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('order_item_id')->references('id')->on('order_items')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};
