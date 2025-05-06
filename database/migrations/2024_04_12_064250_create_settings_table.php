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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            $table->longText('description')->nullable();
            $table->longText('address')->nullable();
            $table->bigInteger('pincode')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone_no1')->nullable();
            $table->bigInteger('phone_no2')->nullable();
            $table->string('copyright_text')->nullable();

            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('youtube_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
