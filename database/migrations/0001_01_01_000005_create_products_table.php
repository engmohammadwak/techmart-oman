<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 60)->unique();
            $table->string('barcode', 60)->unique()->nullable();
            $table->string('name_ar', 200);
            $table->string('name_en', 200);
            $table->string('slug', 220)->unique();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->foreignId('category_id');
            $table->foreignId('brand_id')->nullable();
            $table->enum('condition_type', ['new', 'used'])->default('new');
            $table->enum('condition_grade', ['excellent', 'very_good', 'good', 'fair'])->nullable();
            $table->tinyInteger('battery_health')->unsigned()->nullable();
            $table->json('inspection_report')->nullable();
            $table->integer('warranty_days')->default(730);
            $table->decimal('cost_price', 10, 3)->default(0.000);
            $table->decimal('price', 10, 3);
            $table->decimal('compare_at_price', 10, 3)->nullable();
            $table->decimal('vat_rate', 5, 2)->default(5.00);
            $table->boolean('track_inventory')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->enum('status', ['active', 'draft', 'archived'])->default('draft');
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->fullText(['name_ar', 'name_en', 'description_ar', 'description_en']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
