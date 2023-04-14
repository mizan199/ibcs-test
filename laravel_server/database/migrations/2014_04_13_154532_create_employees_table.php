<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('Month');
            $table->string('Date');
            $table->string('Day');
            $table->string('EmpID');
            $table->string('EmployeeName');
            $table->string('Department');
            $table->time('FirstInTime');
            $table->time('LastOutTime');
            $table->integer('HoursOfWork');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
