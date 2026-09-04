<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('description')->nullable();
            $table->string('vendor')->nullable();
            $table->decimal('amount', 10, 3);
            $table->decimal('vat_amount', 10, 3)->default(0.000);
            $table->enum('payment_method', ['cash', 'bank', 'card'])->default('cash');
            $table->string('receipt_url')->nullable();
            $table->boolean('is_recurring')->default(false);
            $table->foreignId('created_by')->nullable();
            $table->date('expense_date');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
