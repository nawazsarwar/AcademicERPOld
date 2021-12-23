<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWorkExperiencesTable extends Migration
{
    public function up()
    {
        Schema::table('work_experiences', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_5657664')->references('id')->on('users');
        });
    }
}
