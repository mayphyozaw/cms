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
        Schema::create('mix_ratio_templates', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('ratio_name')->nullable();
            $table->string('ratio_type')->nullable();
            $table->decimal('dry_volume_factor', 8, 2)->default(1.54);
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mix_ratio_templates');
    }
};
