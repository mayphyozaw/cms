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
        Schema::table('clients', function (Blueprint $table) {
            $table->string('client_code')->nullable()->after('id');
            $table->string('project_code')->nullable();
            $table->string('building_area')->nullable()->after('address');
            $table->string('storeys')->nullable();
            $table->string('site_location')->nullable();
            $table->string('city')->nullable();
            $table->string('construction_type')->nullable();
            $table->string('job_scope')->nullable();
            $table->string('job_package')->nullable();
            $table->string('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('client_code');
            $table->dropColumn('project_code');
            $table->dropColumn('building_area');
            $table->dropColumn('storeys');
            $table->dropColumn('site_location');
            $table->dropColumn('city');
            $table->dropColumn('construction_type');
            $table->dropColumn('job_scope');
            $table->dropColumn('job_package');
            $table->dropColumn('remark');
        });
    }
};
