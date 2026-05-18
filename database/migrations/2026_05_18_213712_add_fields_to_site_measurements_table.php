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
        Schema::table('site_measurements', function (Blueprint $table) {
            $table->decimal('quantity', 12, 2)->default(0)->after('unit_weight');
            $table->decimal('rate', 12, 2)->default(0)->after('quantity');
            $table->text('remarks')->nullable()->after('total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_measurements', function (Blueprint $table) {
            $table->dropColumn(['quantity','rate','remarks']);
        });
    }
};
