<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRegistrationFormsTable extends Migration
{
    public function up()
    {
        Schema::table('registration_forms', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_5649830')->references('id')->on('courses');
            $table->unsignedBigInteger('academic_session_id')->nullable();
            $table->foreign('academic_session_id', 'academic_session_fk_5649834')->references('id')->on('academic_sessions');
            $table->unsignedBigInteger('programme_duration_type_id')->nullable();
            $table->foreign('programme_duration_type_id', 'programme_duration_type_fk_5649835')->references('id')->on('programme_duration_types');
        });
    }
}
