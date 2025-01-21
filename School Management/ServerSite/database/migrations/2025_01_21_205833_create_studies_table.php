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
        Schema::create('studies', function (Blueprint $table) {
            $table->id('studyID');
            $table->enum('type', ['Lesson', 'Assignment', 'Coursework', 'Exam']);
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('teacherID');
            $table->unsignedBigInteger('subjectID');
            $table->foreign('teacherID')->references('teacherID')->on('teachers')->onDelete('cascade');
            $table->foreign('subjectID')->references('subjectID')->on('subjects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studies');
    }
};
