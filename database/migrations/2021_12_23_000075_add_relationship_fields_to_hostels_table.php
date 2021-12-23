<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHostelsTable extends Migration
{
    public function up()
    {
        Schema::table('hostels', function (Blueprint $table) {
            $table->unsignedBigInteger('hall_id');
            $table->foreign('hall_id', 'hall_fk_5233555')->references('id')->on('halls');
        });
    }
}
