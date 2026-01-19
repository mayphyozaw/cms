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
        Schema::table('users', function (Blueprint $table) {
            $table->string('employee_number')->nullable()->after('id');
            $table->string('phone')->nullable()->after('email');
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('nrc')->nullable();
            $table->string('nrcfrontphoto')->nullable();
            $table->string('nrcbackphoto')->nullable();
            $table->string('householdphoto')->nullable();
            $table->string('referenceletter')->nullable();
            $table->string('esingphoto')->nullable();
            $table->string('photo')->nullable();
            $table->string('department')->nullable();
            $table->string('joindate')->nullable();
            $table->string('employeetype')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('role')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'employee_number',
                'phone',
                'address',
                'gender',
                'nrc',
                'nrcfrontphoto',
                'nrcbackphoto',
                'householdphoto',
                'referenceletter',
                'esingphoto',
                'photo',
                'department',
                'joindate',
                'employeetype',
                'contact_person',
                'role',
                'status'
            ]);
        });
    }
};
