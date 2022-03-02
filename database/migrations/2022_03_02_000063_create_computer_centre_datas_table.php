<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputerCentreDatasTable extends Migration
{
    public function up()
    {
        Schema::create('computer_centre_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uri');
            $table->string('slug')->nullable();
            $table->string('type')->nullable();
            $table->string('parser')->nullable();
            $table->longText('data')->nullable();
            $table->integer('parent')->nullable();
            $table->integer('crawled')->nullable();
            $table->datetime('crawled_at')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
