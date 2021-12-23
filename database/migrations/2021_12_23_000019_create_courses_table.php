<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('title_hindi')->nullable();
            $table->string('title_urdu')->nullable();
            $table->string('code');
            $table->string('course_code')->nullable();
            $table->string('internal_code')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('total_intake')->nullable();
            $table->string('subsidiarizable');
            $table->string('administrable_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
