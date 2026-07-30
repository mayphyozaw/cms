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
        Schema::create('boq_cost_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boq_id')->nullable();
            $table->unsignedBigInteger('boq_quantity_detail_id')->nullable();
            $table->unsignedBigInteger('material_requirement_id')->nullable();
            $table->unsignedBigInteger('variable_asset_id')->nullable();
            $table->decimal('quantity', 18, 2)->default(0);
            $table->string('unit')->nullable();
            $table->decimal('unit_rate', 18, 2)->default(0);
            $table->decimal('amount', 18, 2)->default(0);
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boq_cost_details');
    }
};
