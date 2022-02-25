<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('course_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
