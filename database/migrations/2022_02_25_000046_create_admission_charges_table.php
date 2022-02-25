<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionChargesTable extends Migration
{
    public function up()
    {
        Schema::create('admission_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('boys_nr_external', 15, 2)->nullable();
            $table->decimal('boys_nr_internal', 15, 2)->nullable();
            $table->decimal('boys_resident_external', 15, 2)->nullable();
            $table->decimal('boys_resident_internal', 15, 2)->nullable();
            $table->decimal('girls_nr_external', 15, 2)->nullable();
            $table->decimal('girls_nr_internal', 15, 2)->nullable();
            $table->decimal('girls_resident_external', 15, 2)->nullable();
            $table->decimal('girls_resident_internal', 15, 2)->nullable();
            $table->integer('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
