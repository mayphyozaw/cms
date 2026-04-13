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
        Schema::table('quotation_proposal_items', function (Blueprint $table) {
            $table->unsignedBigInteger('section_id')->nullable()->after('quotation_proposal_id');
            $table->string('type')->after('section_id'); 
            $table->string('item_no')->nullable()->after('type');
            $table->text('title')->nullable()->after('item_no');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotation_proposal_items', function (Blueprint $table) {
            $table->dropColumn(['section_id','type','item_no','title']);
        });
    }
};
