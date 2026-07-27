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
        Schema::create('boq_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boq_id')->nullable();
            $table->unsignedBigInteger('drawing_measurement_id')->nullable();
            $table->unsignedBigInteger('measurement_category_id')->nullable();
            $table->unsignedBigInteger('work_scope_id')->nullable();
            $table->unsignedBigInteger('boq_work_category_id')->nullable();
            $table->string('work_type')->nullable();
            $table->string('item_name')->nullable();
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
        Schema::dropIfExists('boq_details');
    }
};
