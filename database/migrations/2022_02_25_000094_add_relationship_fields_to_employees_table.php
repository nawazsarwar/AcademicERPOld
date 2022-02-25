<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id')->nullable();
            $table->foreign('person_id', 'person_fk_6077712')->references('id')->on('people');
            $table->unsignedBigInteger('employment_status_id')->nullable();
            $table->foreign('employment_status_id', 'employment_status_fk_5656486')->references('id')->on('employment_statuses');
            $table->unsignedBigInteger('verification_status_id')->nullable();
            $table->foreign('verification_status_id', 'verification_status_fk_6077755')->references('id')->on('verification_statuses');
            $table->unsignedBigInteger('verified_by_id')->nullable();
            $table->foreign('verified_by_id', 'verified_by_fk_6077666')->references('id')->on('users');
        });
    }
}
