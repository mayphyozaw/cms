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
        Schema::table('boqs', function (Blueprint $table) {
            $table->string('revision_no')->nullable()->after('boq_date');
            $table->string('prepared_by')->nullable()->after('revision_no');
            $table->date('prepared_date')->nullable()->after('prepared_by');
            $table->string('approved_by')->nullable()->after('prepared_date');
            $table->date('approved_date')->nullable()->after('approved_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boqs', function (Blueprint $table) {
            $table->dropColumn(['revision_no','prepared_by','prepared_date','approved_by','approved_date']);
        });
    }
};
