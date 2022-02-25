<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerScriptsTable extends Migration
{
    public function up()
    {
        Schema::create('answer_scripts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('page_no');
            $table->string('file_path');
            $table->string('extension');
            $table->string('file_url')->nullable();
            $table->string('cdn_url')->nullable();
            $table->integer('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
