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
        Schema::table('engineer_asset_request_items', function (Blueprint $table) {
            $table->date('require_date')->nullable()->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('engineer_asset_request_items', function (Blueprint $table) {
            $table->dropColumn('require_date');
        });
    }
};
