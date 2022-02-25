<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContinuationChargesTable extends Migration
{
    public function up()
    {
        Schema::table('continuation_charges', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_5635515')->references('id')->on('courses');
        });
    }
}
