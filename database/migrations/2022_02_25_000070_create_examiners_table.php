<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminersTable extends Migration
{
    public function up()
    {
        Schema::create('examiners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('name');
            $table->string('institute');
            $table->string('department')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('otp')->nullable();
            $table->string('otp_validity')->nullable();
            $table->integer('otp_verified')->nullable();
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
