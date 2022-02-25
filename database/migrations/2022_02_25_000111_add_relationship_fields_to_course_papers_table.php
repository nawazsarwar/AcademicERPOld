<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCoursePapersTable extends Migration
{
    public function up()
    {
        Schema::table('course_papers', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_6076356')->references('id')->on('courses');
            $table->unsignedBigInteger('paper_id')->nullable();
            $table->foreign('paper_id', 'paper_fk_6076357')->references('id')->on('papers');
            $table->unsignedBigInteger('academic_session_id')->nullable();
            $table->foreign('academic_session_id', 'academic_session_fk_6076359')->references('id')->on('academic_sessions');
        });
    }
}
