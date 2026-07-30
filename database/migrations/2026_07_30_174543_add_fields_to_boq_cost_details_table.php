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
        Schema::table('boq_cost_details', function (Blueprint $table) {
            $table->string('section_id')->nullable()->after('boq_quantity_detail_id');
            $table->string('type')->nullable()->after('section_id');
            $table->string('item_no')->nullable()->after('type');
            $table->string('title')->nullable()->after('item_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boq_cost_details', function (Blueprint $table) {
            $table->dropColumn(['section_id','type','item_no','title']);
        });
    }
};
