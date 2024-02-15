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
        Schema::create('course_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('year_level_id')->constrained();
            $table->foreignId('semester_id')->constrained();
            $table->foreignId('section_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            $table->time('time_from');
            $table->time('time_to');
            $table->json('days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_subject');
    }
};
