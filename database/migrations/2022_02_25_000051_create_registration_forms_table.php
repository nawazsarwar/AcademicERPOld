<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationFormsTable extends Migration
{
    public function up()
    {
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('opening_date');
            $table->date('closing_date');
            $table->string('fillable_current');
            $table->string('fillable_backlog')->nullable();
            $table->integer('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
