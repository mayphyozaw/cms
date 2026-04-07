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
            $table->unsignedBigInteger('transfer_from_warehouse_id')->nullable()->after('require_date');
            $table->unsignedBigInteger('transfer_from_project_id')->nullable()->after('transfer_from_warehouse_id');
            $table->string('sent_date')->nullable()->after('transfer_from_project_id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('engineer_asset_request_items', function (Blueprint $table) {
            $table->dropColumn(['transfer_from_warehouse_id','transfer_from_project_id','sent_date']);
        });
    }
};
