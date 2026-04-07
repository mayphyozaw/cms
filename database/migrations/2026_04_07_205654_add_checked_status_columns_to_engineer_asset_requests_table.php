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
        Schema::table('engineer_asset_requests', function (Blueprint $table) {
            $table->string('qs_checked_status')->nullable()->after('status');
            $table->string('logistics_checked_status')->nullable()->after('qs_checked_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('engineer_asset_requests', function (Blueprint $table) {
             $table->dropColumn(['qs_checked_status','logistics_checked_status']);
        });
    }
};
