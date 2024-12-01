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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('phone')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable(); // Make doctor_id nullable
$table->foreign('doctor_id')->nullable()->references('id')->on('doctors')->onDelete('cascade');
$table->unsignedBigInteger('offer_id')->nullable(); // Make offer_id nullable
$table->foreign('offer_id')->nullable()->references('id')->on('offers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
