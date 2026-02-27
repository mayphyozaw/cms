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
        Schema::table('engineer_requests', function (Blueprint $table) {
             $table->unsignedBigInteger('engineer_assign_id')->after('warehouse_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('engineer_requests', function (Blueprint $table) {
           
            $table->dropColumn('engineer_assign_id');
        });
    }
};
