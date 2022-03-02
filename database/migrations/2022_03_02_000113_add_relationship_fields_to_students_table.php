<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id')->nullable();
            $table->foreign('person_id', 'person_fk_6077692')->references('id')->on('people');
            $table->unsignedBigInteger('enrolment_id')->nullable();
            $table->foreign('enrolment_id', 'enrolment_fk_5233704')->references('id')->on('enrolments');
            $table->unsignedBigInteger('verification_status_id')->nullable();
            $table->foreign('verification_status_id', 'verification_status_fk_6077693')->references('id')->on('verification_statuses');
            $table->unsignedBigInteger('verified_by_id')->nullable();
            $table->foreign('verified_by_id', 'verified_by_fk_6077663')->references('id')->on('users');
        });
    }
}
