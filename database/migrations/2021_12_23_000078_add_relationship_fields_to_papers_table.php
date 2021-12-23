<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPapersTable extends Migration
{
    public function up()
    {
        Schema::table('papers', function (Blueprint $table) {
            $table->unsignedBigInteger('paper_type_id');
            $table->foreign('paper_type_id', 'paper_type_fk_5233632')->references('id')->on('paper_types');
            $table->unsignedBigInteger('administrable_id')->nullable();
            $table->foreign('administrable_id', 'administrable_fk_5647763')->references('id')->on('departments');
        });
    }
}
