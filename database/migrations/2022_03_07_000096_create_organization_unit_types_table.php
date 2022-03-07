<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationUnitTypesTable extends Migration
{
    public function up()
    {
        Schema::create('organization_unit_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('category')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
