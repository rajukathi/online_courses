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
        Schema::create('enrollment', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->foreign('course_id')->references('id')->on('courses');
            $table->unsignedBigInteger('user_id')->foreign('user_id')->references('id')->on('users');
            $table->unique(['course_id', 'user_id']);
            $table->timestamps();
        });
    }
};
