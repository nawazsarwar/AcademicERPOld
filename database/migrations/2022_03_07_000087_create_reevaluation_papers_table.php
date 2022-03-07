<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReevaluationPapersTable extends Migration
{
    public function up()
    {
        Schema::create('reevaluation_papers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paper_code');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
