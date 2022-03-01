<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReevaluationPapersTable extends Migration
{
    public function up()
    {
        Schema::table('reevaluation_papers', function (Blueprint $table) {
            $table->unsignedBigInteger('reevaluation_id')->nullable();
            $table->foreign('reevaluation_id', 'reevaluation_fk_6112785')->references('id')->on('reevaluations');
            $table->unsignedBigInteger('examination_mark_id')->nullable();
            $table->foreign('examination_mark_id', 'examination_mark_fk_6112685')->references('id')->on('examination_marks');
            $table->unsignedBigInteger('paper_id')->nullable();
            $table->foreign('paper_id', 'paper_fk_6112692')->references('id')->on('papers');
        });
    }
}
