<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAcademicSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('course_academic_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
