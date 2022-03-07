<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial_no')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->integer('vacancies');
            $table->string('location');
            $table->string('pay_level');
            $table->string('pay_range');
            $table->decimal('fee', 15, 2);
            $table->datetime('open_date');
            $table->datetime('close_date');
            $table->datetime('payment_close_date');
            $table->integer('withdrawn')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
