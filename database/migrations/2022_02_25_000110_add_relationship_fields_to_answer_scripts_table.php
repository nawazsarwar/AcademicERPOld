<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAnswerScriptsTable extends Migration
{
    public function up()
    {
        Schema::table('answer_scripts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6076231')->references('id')->on('users');
            $table->unsignedBigInteger('paper_id')->nullable();
            $table->foreign('paper_id', 'paper_fk_6076232')->references('id')->on('papers');
        });
    }
}
