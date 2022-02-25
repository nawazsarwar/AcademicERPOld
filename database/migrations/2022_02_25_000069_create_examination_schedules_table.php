<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('examination_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mode');
            $table->string('centre')->nullable();
            $table->datetime('start');
            $table->datetime('end');
            $table->integer('booklet_pages')->nullable();
            $table->string('season')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
