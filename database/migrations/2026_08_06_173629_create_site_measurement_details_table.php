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
        Schema::create('site_measurement_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_measurement_id');
            $table->unsignedBigInteger('boq_detail_id');
            $table->string('actual_nos')->nullable();
            $table->string('actual_length')->nullable();
            $table->string('actual_width')->nullable();
            $table->string('actual_height')->nullable();
            $table->string('actual_thickness')->nullable();
            $table->string('current_qty')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_measurement_details');
    }
};
