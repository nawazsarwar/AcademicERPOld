<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPincodesTable extends Migration
{
    public function up()
    {
        Schema::table('pincodes', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id', 'province_fk_5232853')->references('id')->on('provinces');
        });
    }
}
