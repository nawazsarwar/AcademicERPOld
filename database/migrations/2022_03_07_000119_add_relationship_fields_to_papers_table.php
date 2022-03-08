<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPapersTable extends Migration
{
    public function up()
    {
        Schema::table('papers', function (Blueprint $table) {
            $table->unsignedBigInteger('paper_type_id')->nullable();
            $table->foreign('paper_type_id', 'paper_type_fk_5233632')->references('id')->on('paper_types');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_6156783')->references('id')->on('courses');
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->foreign('faculty_id', 'faculty_fk_6156784')->references('id')->on('faculties');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6156785')->references('id')->on('users');
            $table->unsignedBigInteger('administrable_id')->nullable();
            $table->foreign('administrable_id', 'administrable_fk_5647763')->references('id')->on('departments');
        });
    }
}
