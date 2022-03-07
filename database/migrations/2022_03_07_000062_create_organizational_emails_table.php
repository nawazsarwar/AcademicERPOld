<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationalEmailsTable extends Migration
{
    public function up()
    {
        Schema::create('organizational_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('type');
            $table->string('alias')->nullable();
            $table->string('first_password')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('recovery_email')->nullable();
            $table->string('recovery_phone')->nullable();
            $table->string('gender')->nullable();
            $table->integer('office_365')->nullable();
            $table->string('office_365_uid')->nullable();
            $table->string('office_365_object_uid')->nullable();
            $table->datetime('office_365_deployed_at')->nullable();
            $table->integer('gsuite')->nullable();
            $table->string('gsuite_uid')->nullable();
            $table->datetime('gsuite_deployed_at')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
