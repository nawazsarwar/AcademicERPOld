<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryDatasTable extends Migration
{
    public function up()
    {
        Schema::create('salary_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ecode');
            $table->string('emp_name');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('pay_grade')->nullable();
            $table->decimal('basic', 15, 2)->nullable();
            $table->string('pan_no')->nullable();
            $table->string('desig_name')->nullable();
            $table->string('dept_name')->nullable();
            $table->string('emp_status')->nullable();
            $table->string('date_of_join')->nullable();
            $table->string('sex')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('retire_date')->nullable();
            $table->string('pf_type')->nullable();
            $table->string('emp_grop')->nullable();
            $table->string('leave')->nullable();
            $table->string('designation_category')->nullable();
            $table->integer('exists_cc')->nullable();
            $table->date('import_date');
            $table->string('salary_month')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
