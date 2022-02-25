<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContinuationChargesTable extends Migration
{
    public function up()
    {
        Schema::create('continuation_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('nr_total', 15, 2)->nullable();
            $table->decimal('nr_first_installment', 15, 2)->nullable();
            $table->decimal('nr_second_installment', 15, 2)->nullable();
            $table->decimal('resident_total', 15, 2)->nullable();
            $table->decimal('resident_first_installment', 15, 2)->nullable();
            $table->decimal('resident_second_installment', 15, 2)->nullable();
            $table->integer('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
