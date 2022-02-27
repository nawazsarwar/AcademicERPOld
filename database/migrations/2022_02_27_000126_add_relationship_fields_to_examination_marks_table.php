<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExaminationMarksTable extends Migration
{
    public function up()
    {
        Schema::table('examination_marks', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id', 'student_fk_6082929')->references('id')->on('students');
            $table->unsignedBigInteger('academic_session_id')->nullable();
            $table->foreign('academic_session_id', 'academic_session_fk_6082915')->references('id')->on('academic_sessions');
        });
    }
}
