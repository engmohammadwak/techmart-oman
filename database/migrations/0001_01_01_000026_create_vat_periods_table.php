<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vat_periods', function (Blueprint $table) {
            $table->id();
            $table->date('period_start');
            $table->date('period_end');
            $table->decimal('vat_collected', 10, 3)->default(0.000);
            $table->decimal('vat_paid', 10, 3)->default(0.000);
            $table->decimal('net_payable', 10, 3)->default(0.000);
            $table->enum('status', ['open', 'filed', 'paid'])->default('open');
            $table->timestamp('filed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vat_periods');
    }
};
