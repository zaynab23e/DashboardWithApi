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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->string('details')->nullable();
            $table->string('address')->nullable();
            $table->string('Waitingtime')->nullable();
            $table->foreignId('city_id')->nullable()->references('id')->on('cities');
            $table->foreignId('specialization_id')->nullable()->references('id')->on('Specializations');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
