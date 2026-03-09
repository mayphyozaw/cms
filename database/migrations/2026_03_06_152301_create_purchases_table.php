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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->dateTime('purchase_date');
            $table->string('purchase_no');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('total_amount');
            $table->string('status')->nullable();
            $table->text('remark')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
