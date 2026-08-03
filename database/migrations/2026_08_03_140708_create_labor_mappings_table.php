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
        Schema::create('labor_mappings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drawing_measurement_id')->nullable();
            $table->unsignedBigInteger('labor_type_id')->nullable();
            $table->string('productivity')->nullable();
            $table->string('unit')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labor_mappings');
    }
};
