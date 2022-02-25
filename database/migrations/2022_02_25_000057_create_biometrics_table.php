<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiometricsTable extends Migration
{
    public function up()
    {
        Schema::create('biometrics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('path')->nullable();
            $table->string('cdn_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
