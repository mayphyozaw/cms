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
        Schema::create('asset_request_item_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_request_id');
            $table->unsignedBigInteger('asset_request_item_id');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('remark')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->timestamps();

            $table->foreign('asset_request_id')->references('id')->on('engineer_asset_requests')->onDelete('cascade');
            $table->foreign('asset_request_item_id')->references('id')->on('engineer_asset_request_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_request_item_approvals');
    }
};
