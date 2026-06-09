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
        Schema::create('material_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('drawing_measurement_id')->nullable();
            $table->unsignedBigInteger('material_mapping_id')->nullable();
            $table->unsignedBigInteger('variable_asset_id')->nullable();
            $table->string('raw_quantity');
            $table->string('base_quantity');
            $table->string('final_quantity');
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
        Schema::dropIfExists('material_requirements');
    }
};
