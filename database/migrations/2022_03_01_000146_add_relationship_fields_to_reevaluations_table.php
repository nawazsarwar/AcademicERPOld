<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReevaluationsTable extends Migration
{
    public function up()
    {
        Schema::table('reevaluations', function (Blueprint $table) {
            $table->unsignedBigInteger('exam_registration_id')->nullable();
            $table->foreign('exam_registration_id', 'exam_registration_fk_6112753')->references('id')->on('exam_registrations');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id', 'student_fk_6112770')->references('id')->on('students');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_6112771')->references('id')->on('courses');
        });
    }
}
