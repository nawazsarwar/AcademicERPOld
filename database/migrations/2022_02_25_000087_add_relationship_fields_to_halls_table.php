<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHallsTable extends Migration
{
    public function up()
    {
        Schema::table('halls', function (Blueprint $table) {
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->foreign('campus_id', 'campus_fk_5233547')->references('id')->on('campuses');
        });
    }
}
