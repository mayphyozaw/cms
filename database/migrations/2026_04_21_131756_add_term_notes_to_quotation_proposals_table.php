<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */ public function up(): void
    {
        Schema::table('quotation_proposals', function (Blueprint $table) {
            $table->string('term_notes')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotation_proposals', function (Blueprint $table) {
            $table->dropColumn('term_notes');

        });
    }
};
