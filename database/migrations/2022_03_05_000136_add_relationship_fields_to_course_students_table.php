<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('course_students', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_6076729')->references('id')->on('courses');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6076730')->references('id')->on('users');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id', 'student_fk_6080236')->references('id')->on('students');
            $table->unsignedBigInteger('session_admitted_id')->nullable();
            $table->foreign('session_admitted_id', 'session_admitted_fk_6076732')->references('id')->on('academic_sessions');
            $table->unsignedBigInteger('verification_status_id')->nullable();
            $table->foreign('verification_status_id', 'verification_status_fk_6077683')->references('id')->on('verification_statuses');
            $table->unsignedBigInteger('verified_by_id')->nullable();
            $table->foreign('verified_by_id', 'verified_by_fk_6076736')->references('id')->on('users');
        });
    }
}
