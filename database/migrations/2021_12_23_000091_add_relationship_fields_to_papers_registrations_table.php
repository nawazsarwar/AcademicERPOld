<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPapersRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::table('papers_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('paper_id');
            $table->foreign('paper_id', 'paper_fk_5649889')->references('id')->on('papers');
            $table->unsignedBigInteger('registration_id');
            $table->foreign('registration_id', 'registration_fk_5649890')->references('id')->on('exam_registrations');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id', 'student_fk_5649891')->references('id')->on('students');
        });
    }
}
