<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseAcademicSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('course_academic_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('academic_session_id')->nullable();
            $table->foreign('academic_session_id', 'academic_session_fk_6076426')->references('id')->on('academic_sessions');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_6076427')->references('id')->on('courses');
        });
    }
}
