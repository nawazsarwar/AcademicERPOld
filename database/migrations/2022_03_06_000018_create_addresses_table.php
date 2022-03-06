<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('mobile')->nullable();
            $table->string('details');
            $table->string('street')->nullable();
            $table->string('landmark')->nullable();
            $table->string('locality');
            $table->string('city');
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
