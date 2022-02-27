<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('course_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('faculty_no');
            $table->date('admitted_on')->nullable();
            $table->string('duration_extension')->nullable();
            $table->date('verified_at')->nullable();
            $table->longText('verification_remark')->nullable();
            $table->integer('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
