<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('degree_id');
            $table->foreign('degree_id', 'degree_fk_5649352')->references('id')->on('degrees');
            $table->unsignedBigInteger('campus_id');
            $table->foreign('campus_id', 'campus_fk_5233151')->references('id')->on('campuses');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->foreign('level_id', 'level_fk_5631754')->references('id')->on('course_levels');
            $table->unsignedBigInteger('entrance_type_id');
            $table->foreign('entrance_type_id', 'entrance_type_fk_5649423')->references('id')->on('admission_entrance_types');
            $table->unsignedBigInteger('mode_id');
            $table->foreign('mode_id', 'mode_fk_5649360')->references('id')->on('programme_delivery_modes');
            $table->unsignedBigInteger('duration_type_id');
            $table->foreign('duration_type_id', 'duration_type_fk_5649540')->references('id')->on('programme_duration_types');
            $table->unsignedBigInteger('administrable_id');
            $table->foreign('administrable_id', 'administrable_fk_5635034')->references('id')->on('departments');
        });
    }
}
