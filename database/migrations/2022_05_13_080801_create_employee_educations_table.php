<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_educations', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('education_major_id')->nullable();
            $table->enum('type', ['ELEMENTARY', 'MIDDLE', 'HIGH', 'D1', 'D2', 'D3', 'D4', 'BACHELOR', 'MASTER', 'DOCTORAL'])->nullable();
            $table->date('date_aquired')->nullable();
            $table->string('grade')->nullable();
            $table->string('school_name')->nullable();
            $table->string('city')->nullable();
            $table->string('certificate_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_educations');
    }
}
