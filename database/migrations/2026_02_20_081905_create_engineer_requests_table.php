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
        Schema::create('engineer_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_code')->nullable();
            $table->date('request_date');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('workscope_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('engineer_assing_id');
            $table->string('asset_type')->nullable();
            $table->string('status')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engineer_requests');
    }
};
