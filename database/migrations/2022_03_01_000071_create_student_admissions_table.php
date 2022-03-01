<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAdmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('student_admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('roll_no')->nullable();
            $table->integer('application_no')->nullable();
            $table->string('faculty_no');
            $table->date('admission_date')->nullable();
            $table->longText('counselling_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
