<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationMarksTable extends Migration
{
    public function up()
    {
        Schema::create('examination_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sessional')->nullable();
            $table->integer('theory')->nullable();
            $table->integer('total')->nullable();
            $table->string('grade')->nullable();
            $table->integer('grade_point')->nullable();
            $table->string('result')->nullable();
            $table->integer('part');
            $table->string('status')->nullable();
            $table->string('final_result')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
