<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('hall_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_no')->nullable();
            $table->date('allotment_date')->nullable();
            $table->date('allotted_on')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
