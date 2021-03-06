<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('exam_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('season');
            $table->string('faculty_no');
            $table->string('faculty_code')->nullable();
            $table->integer('part');
            $table->string('room_no')->nullable();
            $table->datetime('verified_at')->nullable();
            $table->longText('verification_remark')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
