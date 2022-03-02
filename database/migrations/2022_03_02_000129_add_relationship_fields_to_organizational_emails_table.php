<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrganizationalEmailsTable extends Migration
{
    public function up()
    {
        Schema::table('organizational_emails', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6075051')->references('id')->on('users');
        });
    }
}
