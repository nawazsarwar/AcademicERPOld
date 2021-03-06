<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPeopleTable extends Migration
{
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5233674')->references('id')->on('users');
            $table->unsignedBigInteger('blood_group_id')->nullable();
            $table->foreign('blood_group_id', 'blood_group_fk_6051497')->references('id')->on('blood_groups');
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->foreign('religion_id', 'religion_fk_5233643')->references('id')->on('religions');
            $table->unsignedBigInteger('caste_id')->nullable();
            $table->foreign('caste_id', 'caste_fk_5656611')->references('id')->on('castes');
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id', 'nationality_fk_5658038')->references('id')->on('countries');
            $table->unsignedBigInteger('domicile_province_id')->nullable();
            $table->foreign('domicile_province_id', 'domicile_province_fk_5233647')->references('id')->on('provinces');
        });
    }
}
