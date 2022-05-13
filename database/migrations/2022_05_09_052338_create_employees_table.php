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
            $table->string('employee_id')->nullable();
            $table->string('last_employee_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('sex', ['F', 'M'])->nullable();
            $table->string('birth_place')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('marital_status', ['SINGLE', 'MARRIED', 'WIDOWER', 'WIDOW'])->nullable();
            $table->enum('religion', ['BUDDHIST', 'CATHOLIC', 'CHRISTIAN', 'HINDU', 'ISLAM', 'CONFUCIANISM', 'NONE'])->nullable();
            $table->enum('employee_type', ['LOCAL', 'EXPATRIATE'])->nullable();
            $table->enum('blood_type', ['O+', 'O-', 'A+', 'A-', 'AB+', 'AB-', 'B+', 'B-'])->nullable();
            $table->string('id_number')->nullable();
            $table->string('npwp_id')->nullable();
            $table->string('npwp_city')->nullable();
            $table->date('npwp_date')->nullable();
            $table->string('current_address')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_subdistrict')->nullable();
            $table->string('current_village')->nullable();
            $table->string('id_address')->nullable();
            $table->string('id_city')->nullable();
            $table->string('id_subdistrict')->nullable();
            $table->string('id_village')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('email_address')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->integer('employee_status_id')->nullable();
            $table->integer('group_shift_id')->nullable();
            $table->enum('always_present', ['Y', 'N'])->default('N');
            $table->string('tax_code')->nullable();
            $table->date('start_date')->nullable();
            $table->date('final_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('termination')->nullable();
            $table->integer('grade_id')->nullable();
            $table->integer('title_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('account_id')->nullable();
            $table->integer('basic_salary')->default(0);
            $table->enum('unit', ['MONTH', 'WEEK', 'DAY', 'HOUR', 'MINUTE'])->nullable();
            $table->integer('bank_id')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_city')->nullable();
            $table->string('cif')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->integer('company_bank_account_id')->nullable();
            $table->enum('nssf_occupation', ['Y', 'N'])->default('N');
            $table->string('nssf_occupation_number')->nullable();
            $table->string('nssf_occupation_join_date')->nullable();
            $table->enum('nssf_health', ['Y', 'N'])->default('N');
            $table->string('nssf_health_number')->nullable();
            $table->string('nssf_health_join_date')->nullable();
            $table->integer('company_id')->nullable();
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
