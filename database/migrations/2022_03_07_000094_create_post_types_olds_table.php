<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTypesOldsTable extends Migration
{
    public function up()
    {
        Schema::create('post_types_olds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('pdf_template');
            $table->string('submission_venue');
            $table->string('status');
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
