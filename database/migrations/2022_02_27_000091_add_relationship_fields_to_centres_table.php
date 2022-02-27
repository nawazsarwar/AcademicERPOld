<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCentresTable extends Migration
{
    public function up()
    {
        Schema::table('centres', function (Blueprint $table) {
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->foreign('faculty_id', 'faculty_fk_5233418')->references('id')->on('faculties');
        });
    }
}
