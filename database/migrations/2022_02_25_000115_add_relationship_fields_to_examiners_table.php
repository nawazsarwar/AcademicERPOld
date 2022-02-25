<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExaminersTable extends Migration
{
    public function up()
    {
        Schema::table('examiners', function (Blueprint $table) {
            $table->unsignedBigInteger('paper_id')->nullable();
            $table->foreign('paper_id', 'paper_fk_6080330')->references('id')->on('papers');
        });
    }
}
