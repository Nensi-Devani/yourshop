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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('size_id')->constrained();
            $table->integer('quantity');
            $table->integer('original_price')->nullable()->default(0);
            $table->integer('price');
            $table->integer('delivery_charge')->default(0);
            $table->tinyInteger('status')->default(1)->comment("0=hidden,1=visible");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sizes');
    }
};
