<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('papers_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mode');
            $table->longText('profile')->nullable();
            $table->string('faculty')->nullable();
            $table->string('department')->nullable();
            $table->string('department_code')->nullable();
            $table->string('paper_code')->nullable();
            $table->string('paper_title')->nullable();
            $table->integer('part')->nullable();
            $table->integer('credits')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
