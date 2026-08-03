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
        Schema::create('labor_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drawing_measurement_id')->nullable();
            $table->unsignedBigInteger('labor_mapping_id')->nullable();
            $table->unsignedBigInteger('labor_type_id')->nullable();
            $table->string('raw_quantity');
            $table->string('required_qty');
            $table->string('unit')->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labor_requirements');
    }
};


       