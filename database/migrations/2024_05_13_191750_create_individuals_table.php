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
        Schema::create('individuals', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('role_applied');
            $table->integer('experience_years');
            $table->integer('age');
            $table->integer('employment_status')->comment('0:no 1:yes');
            $table->integer('joining_period');
            $table->longText('remarks');
            $table->longText('reviewer_remarks')->nullable();
            $table->string('resume_file_id');
            $table->date('application_date');
            $table->integer('dispose')->default(0)->comment('0:not disposed 1:disposed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individuals');
    }
};
