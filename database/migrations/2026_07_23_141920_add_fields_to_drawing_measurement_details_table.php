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
        Schema::table('drawing_measurement_details', function (Blueprint $table) {
            $table->string('thickness')->nullable()->after('height');
            $table->string('thickness_unit')->nullable()->after('thickness');
            $table->string('coats')->nullable()->after('thickness_unit');
            $table->string('unit_weight')->nullable()->after('coats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drawing_measurement_details', function (Blueprint $table) {
            $table->dropColumn([
                'thickness','thickness_unit','coats','unit_weight'
            ]);
        });
    }
};
