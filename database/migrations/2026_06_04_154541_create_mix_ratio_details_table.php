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
        Schema::create('mix_ratio_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mix_ratio_template_id')->nullable();
            $table->unsignedBigInteger('variable_asset_id')->nullable();
            $table->string('part')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mix_ratio_details');
    }
};
