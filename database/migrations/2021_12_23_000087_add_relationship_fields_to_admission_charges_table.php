<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAdmissionChargesTable extends Migration
{
    public function up()
    {
        Schema::table('admission_charges', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_fk_5635496')->references('id')->on('courses');
        });
    }
}
