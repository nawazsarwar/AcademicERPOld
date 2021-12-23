<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomineesTable extends Migration
{
    public function up()
    {
        Schema::create('nominees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('relationship')->nullable();
            $table->string('age')->nullable();
            $table->string('witness_name_1')->nullable();
            $table->string('designation_witness_1')->nullable();
            $table->string('department_witness_1')->nullable();
            $table->string('witness_name_2')->nullable();
            $table->string('designation_witness_2')->nullable();
            $table->string('department_witness_2')->nullable();
            $table->integer('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
