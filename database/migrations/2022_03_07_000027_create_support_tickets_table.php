<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('content')->nullable();
            $table->string('auther_name');
            $table->string('author_email');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
