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
        Schema::table('quotation_proposals', function (Blueprint $table) {
            $table->string('proposalInvoice_no')->nullable()->after('id'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotation_proposals', function (Blueprint $table) {
             $table->dropColumn('proposalInvoice_no');
        });
    }
};
