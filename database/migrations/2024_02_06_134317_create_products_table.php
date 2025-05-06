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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); // relationship with caregory table
            $table->foreignId('sub_category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('material_id')->nullable()->constrained();
            $table->foreignId('color_id')->nullable()->constrained();
            $table->mediumText('small_description');
            $table->longText('description');

            $table->integer('original_price')->default(0);
            $table->integer('selling_price')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('delivery_charge')->default(0);
            $table->tinyInteger('trending')->default('1')->comment('0=not-trending,1=trending');
            $table->tinyInteger('featured')->default('1')->comment('0=not-featured,1=featured');
            $table->tinyInteger('status')->default('1')->comment('0=hidden,1=visible');
            $table->tinyInteger('available')->default('1')->comment('0=not-available, 1=available');

            $table->foreignId('parent_id')->nullable()->constrained('products');

            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
