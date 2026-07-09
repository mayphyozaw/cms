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
        Schema::create('drawing_measurement_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drawing_measurement_id');
            $table->text('description')->nullable();
            $table->string('formula_type')->nullable();
            $table->string('nos')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('deduction')->nullable();
            $table->string('gross_quantity')->nullable();
            $table->string('net_quantity')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps();
        });
    }

      

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drawing_measurement_details');
    }
};
