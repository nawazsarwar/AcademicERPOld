<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_no')->unique();
            $table->string('service_book_no')->nullable();
            $table->string('application_no')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->date('status_date')->nullable();
            $table->string('group')->nullable();
            $table->string('retirement_scheme')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('leave_account_no')->nullable();
            $table->string('pf_account_no')->nullable();
            $table->string('personal_file_no')->nullable();
            $table->longText('remarks')->nullable();
            $table->datetime('verified_at')->nullable();
            $table->longText('verification_remark')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
