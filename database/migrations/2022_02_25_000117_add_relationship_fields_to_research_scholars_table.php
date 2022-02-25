<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToResearchScholarsTable extends Migration
{
    public function up()
    {
        Schema::table('research_scholars', function (Blueprint $table) {
            $table->unsignedBigInteger('registration_id')->nullable();
            $table->foreign('registration_id', 'registration_fk_6082094')->references('id')->on('exam_registrations');
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->foreign('supervisor_id', 'supervisor_fk_6082096')->references('id')->on('employees');
        });
    }
}
