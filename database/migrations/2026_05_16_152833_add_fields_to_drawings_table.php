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
        Schema::table('drawings', function (Blueprint $table) {
            $table->string('drawing_no')->nullable()->after('drawing_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drawings', function (Blueprint $table) {
            $table->dropColumn('drawing_no');
        });
    }
};
