<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationTypesTable extends Migration
{
    public function up()
    {
        Schema::create('designation_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
