<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentPagesTable extends Migration
{
    public function up()
    {
        Schema::create('content_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('type')->nullable();
            $table->longText('content')->nullable();
            $table->longText('excerpt')->nullable();
            $table->string('link')->nullable();
            $table->string('status')->nullable();
            $table->integer('approved')->nullable();
            $table->datetime('publish_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
