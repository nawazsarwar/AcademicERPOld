<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id', 'country_fk_5658039')->references('id')->on('countries');
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id', 'person_fk_5635443')->references('id')->on('people');
            $table->unsignedBigInteger('postal_code_id');
            $table->foreign('postal_code_id', 'postal_code_fk_5635472')->references('id')->on('postal_codes');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id', 'province_fk_5630187')->references('id')->on('provinces');
        });
    }
}
