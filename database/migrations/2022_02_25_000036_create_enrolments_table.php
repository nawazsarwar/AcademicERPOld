<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentsTable extends Migration
{
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->unique();
            $table->integer('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
