<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNotificablesTable extends Migration
{
    public function up()
    {
        Schema::table('notificables', function (Blueprint $table) {
            $table->unsignedBigInteger('notification_id')->nullable();
            $table->foreign('notification_id', 'notification_fk_6119806')->references('id')->on('notifications');
        });
    }
}
