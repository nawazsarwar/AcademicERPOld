<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('course_code')->nullable();
            $table->string('internal_code')->nullable();
            $table->string('mode')->nullable();
            $table->string('course_type')->nullable();
            $table->string('test_type')->nullable();
            $table->integer('duration')->nullable();
            $table->string('duration_type')->nullable();
            $table->integer('total_intake')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
