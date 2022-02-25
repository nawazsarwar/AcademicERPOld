<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExamRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::table('exam_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id', 'student_fk_5649866')->references('id')->on('students');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_5649867')->references('id')->on('courses');
            $table->unsignedBigInteger('subsidiary_one_id')->nullable();
            $table->foreign('subsidiary_one_id', 'subsidiary_one_fk_5649868')->references('id')->on('courses');
            $table->unsignedBigInteger('subsidiary_two_id')->nullable();
            $table->foreign('subsidiary_two_id', 'subsidiary_two_fk_5649869')->references('id')->on('courses');
            $table->unsignedBigInteger('academic_session_id')->nullable();
            $table->foreign('academic_session_id', 'academic_session_fk_5649871')->references('id')->on('academic_sessions');
            $table->unsignedBigInteger('hall_id')->nullable();
            $table->foreign('hall_id', 'hall_fk_5649876')->references('id')->on('halls');
            $table->unsignedBigInteger('hostel_id')->nullable();
            $table->foreign('hostel_id', 'hostel_fk_5649877')->references('id')->on('hostels');
            $table->unsignedBigInteger('verification_status_id')->nullable();
            $table->foreign('verification_status_id', 'verification_status_fk_6077675')->references('id')->on('verification_statuses');
            $table->unsignedBigInteger('verified_by_id')->nullable();
            $table->foreign('verified_by_id', 'verified_by_fk_5649880')->references('id')->on('users');
        });
    }
}
