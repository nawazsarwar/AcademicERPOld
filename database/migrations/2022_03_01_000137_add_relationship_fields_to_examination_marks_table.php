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
            $table->unsignedBigInteger('registration_id')->nullable();
            $table->foreign('registration_id', 'registration_fk_6112466')->references('id')->on('exam_registrations');
            $table->unsignedBigInteger('paper_id')->nullable();
            $table->foreign('paper_id', 'paper_fk_6112467')->references('id')->on('papers');
            $table->unsignedBigInteger('entered_by_id')->nullable();
            $table->foreign('entered_by_id', 'entered_by_fk_6112537')->references('id')->on('users');
            $table->unsignedBigInteger('verified_by_id')->nullable();
            $table->foreign('verified_by_id', 'verified_by_fk_6112539')->references('id')->on('users');
        });
    }
}
