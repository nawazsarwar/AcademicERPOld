<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('ticket_id');
            $table->foreign('ticket_id', 'ticket_fk_5233534')->references('id')->on('tickets');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_5233535')->references('id')->on('users');
        });
    }
}
