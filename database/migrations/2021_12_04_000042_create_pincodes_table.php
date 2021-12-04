<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePincodesTable extends Migration
{
    public function up()
    {
        Schema::create('pincodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('locality')->nullable();
            $table->string('pincode')->unique();
            $table->string('sub_district')->nullable();
            $table->string('district');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
