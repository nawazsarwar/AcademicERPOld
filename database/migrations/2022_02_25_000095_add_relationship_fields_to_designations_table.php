<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDesignationsTable extends Migration
{
    public function up()
    {
        Schema::table('designations', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_5657003')->references('id')->on('designation_types');
        });
    }
}
