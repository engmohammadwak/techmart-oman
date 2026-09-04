<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->foreignId('user_id')->primary();
            $table->string('avatar')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->integer('loyalty_points')->default(0);
            $table->enum('loyalty_tier', ['silver', 'gold', 'platinum'])->default('silver');
            $table->decimal('wallet_balance', 10, 3)->default(0.000);
            $table->string('referral_code', 20)->unique();
            $table->foreignId('referred_by')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_profiles');
    }
};
