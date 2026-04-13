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
        Schema::create('quotation_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('main_subject')->nullable();
            $table->date('proposal_date')->nullable();
            $table->unsignedBigInteger('workscope_id');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('project_id');
            $table->string('project_code')->nullable();
            $table->decimal('subtotal_amount', 15, 2)->default(0);
            $table->decimal('tax_amount', 15, 2)->default(0);
            $table->decimal('discount_amount', 15, 2)->default(0);
            $table->decimal('total_amount', 15, 2)->default(0);
            $table->decimal('due_amount', 15, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation_proposals');
    }
};
