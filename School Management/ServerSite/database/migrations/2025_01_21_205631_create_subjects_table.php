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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('subjectID');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('adminID');
            $table->foreign('adminID')->references('adminID')->on('admins')->onDelete('cascade');
            $table->string('fileUploadPath');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
