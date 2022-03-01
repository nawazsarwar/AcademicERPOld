<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReevaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('reevaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('examination_name')->nullable();
            $table->string('examination_year')->nullable();
            $table->string('examination_part')->nullable();
            $table->date('result_declaration_date');
            $table->integer('submitted')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
