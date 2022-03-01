<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDialoguesTable extends Migration
{
    public function up()
    {
        Schema::create('dialogues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pingback_url')->nullable();
            $table->string('request_type')->nullable();
            $table->longText('raw_response')->nullable();
            $table->longText('response')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
