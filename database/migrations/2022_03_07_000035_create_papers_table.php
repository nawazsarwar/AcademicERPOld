<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersTable extends Migration
{
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('title');
            $table->integer('part')->nullable();
            $table->string('teaching_status')->nullable();
            $table->string('credits')->nullable();
            $table->string('category')->nullable();
            $table->string('delivery_mode')->nullable();
            $table->integer('sessional')->nullable();
            $table->integer('end_term')->nullable();
            $table->string('administrable_type')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
