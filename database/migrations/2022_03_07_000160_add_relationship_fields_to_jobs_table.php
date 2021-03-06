<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobsTable extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('advertisement_id')->nullable();
            $table->foreign('advertisement_id', 'advertisement_fk_6141750')->references('id')->on('advertisements');
            $table->unsignedBigInteger('posttype_id')->nullable();
            $table->foreign('posttype_id', 'posttype_fk_6141751')->references('id')->on('old_post_types');
            $table->unsignedBigInteger('added_by_id')->nullable();
            $table->foreign('added_by_id', 'added_by_fk_6141767')->references('id')->on('users');
        });
    }
}
