<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 30)->unique();
            $table->string('invoicable_type');
            $table->foreignId('invoicable_id');
            $table->enum('type', ['sale', 'purchase'])->default('sale');
            $table->decimal('amount', 10, 3);
            $table->decimal('vat_amount', 10, 3)->default(0.000);
            $table->decimal('total', 10, 3);
            $table->enum('status', ['paid', 'pending', 'overdue', 'cancelled'])->default('pending');
            $table->date('due_date')->nullable();
            $table->timestamp('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
