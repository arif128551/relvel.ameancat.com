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
        Schema::create('career_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('role_type')->default(0)->comment('0:Applicant, 1:Employee, 2:User, 3:Admin, 4:
            ');
            $table->string('role_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_roles');
    }
};
