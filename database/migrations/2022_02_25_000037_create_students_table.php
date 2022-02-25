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
            $table->string('guardian_mobile_no')->nullable();
            $table->date('verified_at')->nullable();
            $table->longText('verification_remark')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
