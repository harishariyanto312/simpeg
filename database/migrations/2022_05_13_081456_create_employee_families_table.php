<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_families', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('name');
            $table->enum('sex', ['F', 'M'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('status', ['ALIVE', 'DIED', 'MARRIED', 'WORK', 'ADULT', 'SUPPORT'])->default('ALIVE');
            $table->string('status_tax')->nullable();
            $table->enum('same_company', ['Y', 'N'])->default('N');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_families');
    }
}
