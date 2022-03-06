<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employer');
            $table->string('employer_type');
            $table->string('designation');
            $table->date('employed_from');
            $table->date('employed_to')->nullable();
            $table->boolean('current_role')->default(0)->nullable();
            $table->string('responsibilities');
            $table->string('reason_for_leaving')->nullable();
            $table->string('pay_band')->nullable();
            $table->string('basic_pay')->nullable();
            $table->string('gross_pay')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
