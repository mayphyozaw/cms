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
        Schema::create('boq_quantity_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boq_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('type')->nullable();
            $table->string('item_no')->nullable();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('drawing_measurement_id')->nullable();
            $table->string('unit')->nullable();
            $table->string('qunatity')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boq_quantity_details');
    }
};
