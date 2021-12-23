<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('enrolment_id');
            $table->foreign('enrolment_id', 'enrolment_fk_5233704')->references('id')->on('enrolments');
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id', 'person_fk_5650019')->references('id')->on('people');
        });
    }
}
