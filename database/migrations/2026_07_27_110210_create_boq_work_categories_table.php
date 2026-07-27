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
        Schema::create('boq_work_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_scope_id')->nullable();
            $table->string('boq_work_types')->nullable();
            $table->string('category_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boq_work_categories');
    }
};

// Civil Works => 
//  ├─ Concrete Works
//  ├─ Masonry Works
//  ├─ Plastering Works
//  └─ Flooring Works

// Finishing Works
//  ├─ Painting Works
//  └─ Ceiling Works

// MEP Works
//  ├─ Electrical Works
//  └─ Plumbing Works

// id
// work_scope_id
// category_name

// Concrete Works
// Masonry Works
// Plastering Works
// Painting Works
// Flooring Works
// Steel Works
// Electrical Works
// Plumbing Works
