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
        Schema::create('engineer_asset_request_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_request_id');
            $table->unsignedBigInteger('asset_id');
            $table->string('quantity');
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engineer_asset_request_items');
    }
};
