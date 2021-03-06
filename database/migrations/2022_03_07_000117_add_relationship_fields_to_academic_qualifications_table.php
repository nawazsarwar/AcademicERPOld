<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAcademicQualificationsTable extends Migration
{
    public function up()
    {
        Schema::table('academic_qualifications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5233565')->references('id')->on('users');
            $table->unsignedBigInteger('qualification_level_id')->nullable();
            $table->foreign('qualification_level_id', 'qualification_level_fk_5233600')->references('id')->on('qualification_levels');
            $table->unsignedBigInteger('board_id')->nullable();
            $table->foreign('board_id', 'board_fk_5233603')->references('id')->on('boards');
        });
    }
}
