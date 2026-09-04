<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->enum('type', ['home', 'work', 'other'])->default('home');
            $table->string('full_name', 150);
            $table->string('phone', 20);
            $table->string('governorate', 50);
            $table->string('wilayat', 100);
            $table->string('street')->nullable();
            $table->string('building_no', 50)->nullable();
            $table->string('landmark')->nullable();
            $table->text('delivery_notes')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
