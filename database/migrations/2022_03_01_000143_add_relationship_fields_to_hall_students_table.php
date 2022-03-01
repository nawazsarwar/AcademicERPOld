<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHallStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('hall_students', function (Blueprint $table) {
            $table->unsignedBigInteger('hall_id')->nullable();
            $table->foreign('hall_id', 'hall_fk_6111836')->references('id')->on('halls');
            $table->unsignedBigInteger('hostel_id')->nullable();
            $table->foreign('hostel_id', 'hostel_fk_6111837')->references('id')->on('hostels');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id', 'student_fk_6111839')->references('id')->on('students');
            $table->unsignedBigInteger('allotted_by_id')->nullable();
            $table->foreign('allotted_by_id', 'allotted_by_fk_6111841')->references('id')->on('users');
        });
    }
}
