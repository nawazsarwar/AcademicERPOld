<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAdvertisementsTable extends Migration
{
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->unsignedBigInteger('added_by_id')->nullable();
            $table->foreign('added_by_id', 'added_by_fk_6141713')->references('id')->on('users');
            $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->foreign('approved_by_id', 'approved_by_fk_6141714')->references('id')->on('users');
        });
    }
}
