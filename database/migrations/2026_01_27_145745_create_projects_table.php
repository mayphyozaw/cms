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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_files_id')->nullable();
            $table->unsignedBigInteger('project_category_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('project_type');
            $table->string('status')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('overall_progress')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
