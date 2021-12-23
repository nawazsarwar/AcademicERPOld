<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSupportTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id', 'status_fk_5233524')->references('id')->on('support_statuses');
            $table->unsignedBigInteger('priority_id');
            $table->foreign('priority_id', 'priority_fk_5233525')->references('id')->on('support_priorities');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_5233526')->references('id')->on('support_categories');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_5233529')->references('id')->on('users');
        });
    }
}
