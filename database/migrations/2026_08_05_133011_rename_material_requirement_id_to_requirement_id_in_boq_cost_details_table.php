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
        Schema::table('boq_cost_details', function (Blueprint $table) {
            $table->renameColumn('material_requirement_id','requirement_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boq_cost_details', function (Blueprint $table) {
             $table->renameColumn('requirement_id', 'material_requirement_id');
        });
    }
};
