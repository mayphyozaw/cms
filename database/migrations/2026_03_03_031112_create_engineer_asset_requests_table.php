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
        Schema::create('engineer_asset_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_code');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('workscope_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('asset_type', ['fixedAssets', 'variableAssets']);
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engineer_asset_requests');
    }
};
