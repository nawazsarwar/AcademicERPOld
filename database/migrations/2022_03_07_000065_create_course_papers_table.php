<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePapersTable extends Migration
{
    public function up()
    {
        Schema::create('course_papers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fraction')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
