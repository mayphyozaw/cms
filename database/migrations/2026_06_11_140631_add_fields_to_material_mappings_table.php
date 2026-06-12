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
        Schema::table('material_mappings', function (Blueprint $table) {
            $table->string('coverage_qty')->nullable()->after('consumption_type');
            $table->string('percentage')->nullable()->after('coverage_qty');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_mappings', function (Blueprint $table) {
            $table->dropColumn(['coverage_qty','percentage']);
        });
    }
};
