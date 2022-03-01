<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchScholarsTable extends Migration
{
    public function up()
    {
        Schema::create('research_scholars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->date('admission_date')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->string('co_supervisor_name')->nullable();
            $table->longText('co_supervisor_address')->nullable();
            $table->string('research_topic');
            $table->string('net_jrf')->nullable();
            $table->date('bos_date')->nullable();
            $table->date('casr_date')->nullable();
            $table->string('paper_1');
            $table->string('paper_1_result');
            $table->string('paper_2')->nullable();
            $table->string('paper_2_result')->nullable();
            $table->string('paper_3')->nullable();
            $table->string('paper_3_result')->nullable();
            $table->string('paper_4')->nullable();
            $table->string('paper_4_result')->nullable();
            $table->date('pre_submission_date')->nullable();
            $table->date('submission_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
