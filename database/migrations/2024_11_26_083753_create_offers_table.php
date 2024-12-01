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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('address');
            $table->string('title');
            $table->string('newPrice');
            $table->string('oldPrice');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->nullable()->references('id')->on('Cities');
            $table->unsignedBigInteger('specialization_id'); // Corrected typo
            $table->foreign('specialization_id')->references('id')->on('specializations');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
