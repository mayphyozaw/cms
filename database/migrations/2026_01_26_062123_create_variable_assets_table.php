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
        Schema::create('variable_assets', function (Blueprint $table) {
            $table->id();
            $table->string('material_code')->nullable();
            $table->unsignedBigInteger('variable_category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('unit')->nullable();
            $table->string('total_qty')->nullable();
            $table->string('reorder_level')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variable_assets');
    }
};
