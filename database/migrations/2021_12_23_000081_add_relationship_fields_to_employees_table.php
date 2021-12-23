<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('employment_status_id')->nullable();
            $table->foreign('employment_status_id', 'employment_status_fk_5656486')->references('id')->on('employment_statuses');
        });
    }
}
