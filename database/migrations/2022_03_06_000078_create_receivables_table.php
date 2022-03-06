<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivablesTable extends Migration
{
    public function up()
    {
        Schema::create('receivables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('narration');
            $table->string('description')->nullable();
            $table->decimal('amount', 15, 2);
            $table->datetime('raised_on')->nullable();
            $table->string('settlement_status')->nullable();
            $table->datetime('settled_on')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
