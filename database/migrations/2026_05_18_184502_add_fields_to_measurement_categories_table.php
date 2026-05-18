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
        Schema::table('measurement_categories', function (Blueprint $table) {
            $table->string('formula_types')->nullable()->after('category_name');
            $table->string('symbol')->nullable()->after('formula_types');
            $table->string('unit')->nullable()->after('symbol');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('measurement_categories', function (Blueprint $table) {
            $table->dropColumn(['formula_types','symbol','unit']);
        });
    }
};
