<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDialoguesTable extends Migration
{
    public function up()
    {
        Schema::table('dialogues', function (Blueprint $table) {
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_fk_6101502')->references('id')->on('merchants');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->foreign('transaction_id', 'transaction_fk_6101503')->references('id')->on('transactions');
        });
    }
}
