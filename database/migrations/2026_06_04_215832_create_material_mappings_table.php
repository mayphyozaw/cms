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
        Schema::create('material_mappings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('measurement_category_id')->nullable();
            $table->unsignedBigInteger('variable_asset_id')->nullable();
            $table->unsignedBigInteger('mix_ratio_template_id')->nullable();
            $table->string('consumption_type')->nullable();
            $table->string('consumption_ratio')->nullable();
            $table->string('wastage_percentage')->nullable();
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
        Schema::dropIfExists('material_mappings');
    }
};
