<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 20)->unique();
            $table->string('governorate');
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('manager_id')->nullable();
            $table->string('opening_hours')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('manager_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
