<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHostelRoomsTable extends Migration
{
    public function up()
    {
        Schema::table('hostel_rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('hostel_id')->nullable();
            $table->foreign('hostel_id', 'hostel_fk_5510998')->references('id')->on('hostels');
        });
    }
}
