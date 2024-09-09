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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('dob');
            $table->string('gender');
            $table->string('marital');
            $table->string('course');
            $table->string('certificate');
            $table->string('subjectone')->nullable();
            $table->string('classone')->nullable();
            $table->string('subjecttwo')->nullable();
            $table->string('classtwo')->nullable();
            $table->string('subjectthree')->nullable();
            $table->string('classthree')->nullable();
            $table->string('subjectfour')->nullable();
            $table->string('classfour')->nullable();
            $table->string('subjectfive')->nullable();
            $table->string('classfive')->nullable();
            $table->string('subjectsix')->nullable();
            $table->string('classsix')->nullable();
            $table->string('subjectseven')->nullable();
            $table->string('classseven')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
