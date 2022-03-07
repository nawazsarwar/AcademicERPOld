<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrganigramsTable extends Migration
{
    public function up()
    {
        Schema::table('organigrams', function (Blueprint $table) {
            $table->unsignedBigInteger('organizational_unit_id')->nullable();
            $table->foreign('organizational_unit_id', 'organizational_unit_fk_6156508')->references('id')->on('organization_units');
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->foreign('designation_id', 'designation_fk_6156509')->references('id')->on('designations');
            $table->unsignedBigInteger('reporting_designation_id')->nullable();
            $table->foreign('reporting_designation_id', 'reporting_designation_fk_6156510')->references('id')->on('designations');
        });
    }
}
