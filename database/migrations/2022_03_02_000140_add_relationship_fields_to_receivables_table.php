<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReceivablesTable extends Migration
{
    public function up()
    {
        Schema::table('receivables', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6101111')->references('id')->on('users');
            $table->unsignedBigInteger('raised_by_id')->nullable();
            $table->foreign('raised_by_id', 'raised_by_fk_6101115')->references('id')->on('users');
        });
    }
}
