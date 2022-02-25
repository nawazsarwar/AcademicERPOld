<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPhonesTable extends Migration
{
    public function up()
    {
        Schema::table('phones', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5233610')->references('id')->on('users');
            $table->unsignedBigInteger('dialing_code_id')->nullable();
            $table->foreign('dialing_code_id', 'dialing_code_fk_6075994')->references('id')->on('countries');
        });
    }
}
