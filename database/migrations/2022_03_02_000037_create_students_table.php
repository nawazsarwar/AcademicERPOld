<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('enrolment_no')->unique();
            $table->string('mobile_no')->nullable();
            $table->string('guardians_mobile_no')->nullable();
            $table->string('emergency_mobile_no')->nullable();
            $table->datetime('verified_at')->nullable();
            $table->longText('verification_remark')->nullable();
            $table->integer('detained')->nullable();
            $table->longText('detention_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
