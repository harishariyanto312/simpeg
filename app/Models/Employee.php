<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sex()
    {
        if ($this->sex == 'F') {
            return __('system.employee_sex_female');
        }
        return __('system.employee_sex_male');
    }

    public function date_of_birth()
    {
        return date('d/m/Y', strtotime($this->date_of_birth));
    }

    public function marital_status()
    {
        switch ($this->marital_status) {
            case 'SINGLE':
                return __('system.marital_status_single');
                break;

            case 'MARRIED':
                return __('system.marital_status_married');
                break;

            case 'WIDOWER':
                return __('system.marital_status_widower');
                break;

            case 'WIDOW':
                return __('system.marital_status_widow');
                break;
            
            default:
                return '';
                break;
        }
    }

    public function religion()
    {
        switch ($this->religion) {
            case 'BUDDHIST':
                return __('system.religion_buddhist');
                break;
            case 'HINDU':
                return __('system.religion_hindu');
                break;
            case 'ISLAM':
                return __('system.religion_islam');
                break;
            case 'CATHOLIC':
                return __('system.religion_catholic');
                break;
            case 'CONFUCIANISM':
                return __('system.religion_confucianism');
                break;
            case 'CHRISTIAN':
                return __('system.religion_christian');
                break;
            case 'NONE':
                return __('system.religion_none');
                break;
            
            default:
                return '';
                break;
        }
    }

    public function employee_type()
    {
        switch ($this->employee_type) {
            case 'LOCAL':
                return __('system.employee_type_local');
                break;

            case 'EXPATRIATE':
                return __('system.employee_type_expatriate');
                break;
            
            default:
                return '';
                break;
        }
    }

    public function npwp_date()
    {
        return date('d/m/Y', strtotime($this->npwp_date));   
    }

    public function basic_salary()
    {
        $basic_salary = 'Rp';
        $basic_salary .= number_format($this->basic_salary, 2, ',', '.');
        return $basic_salary;
    }

    public function salary_unit()
    {
        switch ($this->unit) {
            case 'MONTH':
                return __('system.salary_unit_month');
                break;

            case 'WEEK':
                return __('system.salary_unit_week');
                break;

            case 'DAY':
                return __('system.salary_unit_day');
                break;

            case 'HOUR':
                return __('system.salary_unit_hour');
                break;

            case 'MINUTE':
                return __('system.salary_unit_minute');
                break;
            
            default:
                return __('system.salary_unit_month');
                break;
        }
    }

    public function emergency_contacts()
    {
        return $this->hasMany(EmergencyContact::class);
    }

    public function employee_educations()
    {
        return $this->hasMany(EmployeeEducation::class);
    }

    public function employee_families()
    {
        return $this->hasMany(EmployeeFamily::class);
    }

    public function employee_work_experiences()
    {
        return $this->hasMany(EmployeeWorkExperience::class);
    }
}
