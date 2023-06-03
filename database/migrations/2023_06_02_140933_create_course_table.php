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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->text('description');
            $table->unsignedBigInteger('user_id')->foreign('user_id')->references('id')->on('users');
            $table->dateTime('start_date', $precision = 0);
            $table->dateTime('end_date', $precision = 0);
            $table->timestamps();
        });
    }
};
