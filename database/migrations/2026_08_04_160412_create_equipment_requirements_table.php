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
        Schema::create('equipment_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drawing_measurement_id')->nullable();
            $table->unsignedBigInteger('equipment_mapping_id')->nullable();
            $table->unsignedBigInteger('equipment_id')->nullable();
            $table->string('measurement_qty');
            $table->string('productivity');
            $table->string('productivity_unit');
            $table->string('required_qty');
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
        Schema::dropIfExists('equipment_requirements');
    }
};
