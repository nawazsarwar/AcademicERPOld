<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('fathers_first_name');
            $table->string('fathers_middle_name')->nullable();
            $table->string('fathers_last_name')->nullable();
            $table->string('mothers_first_name');
            $table->string('mothers_middle_name')->nullable();
            $table->string('mothers_last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('disability')->nullable();
            $table->string('disability_type')->nullable();
            $table->integer('aadhaar_no')->nullable();
            $table->string('sub_caste')->nullable();
            $table->string('identity_marks')->nullable();
            $table->string('dob_proof')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->integer('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
