<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificablesTable extends Migration
{
    public function up()
    {
        Schema::create('notificables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('notificable');
            $table->string('notificable_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
