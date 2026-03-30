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
            $table->integer('passed_qty')->default(0)->after('quantity');
            $table->foreignId('checked_by')->nullable()->constrained('users')->after('passed_qty');
            $table->timestamp('checked_at')->nullable()->after('checked_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('engineer_asset_request_items', function (Blueprint $table) {
            //
        });
    }
};
