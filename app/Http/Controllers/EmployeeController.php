<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.employees') => ''
        ];

        return view('pages.employees.index', compact('breadcrumb'));
    }

    public function jsonIndex(Request $request)
    {

        $params_draw = $request->query('draw', 1);
        $params_start = $request->query('start', 0);
        $params_length = $request->query('length', 25);
        $params_search = $request->query('search');

        $column_mapping = [
            'nip',
            'name',
            'gender'
        ];

        $employees = Employee::when($params_search, function ($query, $params_search) {
            return $query->where(function ($q) use ($params_search) {
                $q->where('name', 'like', '%' . $params_search['value'] . '%');
            });
        });
        $employees = $employees->skip($params_start)
            ->take($params_length)
            ->get();
        
        $employees_count = Employee::count();

        $result = [];
        foreach ($employees as $employee) {
            $result[] = [
                'nip' => $employee->nip,
                'name' => $employee->name,
                'gender' => $employee->gender
            ];
        }

        return [
            'draw' => intval($params_draw),
            'data' => $result,
            'recordsTotal' => $employees_count,
            'recordsFiltered' => $employees_count
        ];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.employees') => route('employees.index'),
            __('system.employees_create') => ''
        ];

        $years = [];
        $year_max = date('Y') - 17;
        for ($i = 1940; $i <= $year_max; $i++) {
            $years[$i] = $i;
        }

        $months = $this->months();

        $emergency_contact_relationships = [
            '' => __('system.select_emergency_contact_relationship'),
            __('system.relationship_wife') => __('system.relationship_wife'),
            __('system.relationship_husband') => __('system.relationship_husband'),
            __('system.relationship_girlfriend') => __('system.relationship_girlfriend'),
            __('system.relationship_father') => __('system.relationship_father'),
            __('system.relationship_mother') => __('system.relationship_mother'),
            __('system.relationship_father_in_law') => __('system.relationship_father_in_law'),
            __('system.relationship_mother_in_law') => __('system.relationship_mother_in_law'),
            __('system.relationship_younger_sibling') => __('system.relationship_younger_sibling'),
            __('system.relationship_older_sibling') => __('system.relationship_older_sibling'),
            __('system.relationship_cousin') => __('system.relationship_cousin'),
            __('system.relationship_friend') => __('system.relationship_friend'),
            __('system.relationship_child') => __('system.relationship_child'),
            __('system.relationship_other') => __('system.relationship_other'),
        ];

        $family_relationships = [
            '' => __('system.select_family_relationship'),
            __('system.relationship_wife') => __('system.relationship_wife'),
            __('system.relationship_husband') => __('system.relationship_husband'),
            __('system.relationship_child') => __('system.relationship_child'),
            __('system.relationship_father') => __('system.relationship_father'),
            __('system.relationship_mother') => __('system.relationship_mother'),
            __('system.relationship_father_in_law') => __('system.relationship_father_in_law'),
            __('system.relationship_mother_in_law') => __('system.relationship_mother_in_law'),
            __('system.relationship_younger_sibling') => __('system.relationship_younger_sibling'),
            __('system.relationship_older_sibling') => __('system.relationship_older_sibling'),
        ];

        $salary_units = [
            'MONTH' => __('system.salary_unit_month'),
            'WEEK' => __('system.salary_unit_week'),
            'DAY' => __('system.salary_unit_day'),
            'HOUR' => __('system.salary_unit_hour'),
            'MINUTE' => __('system.salary_unit_minute'),
        ];

        $education_types = [
            '' => __('system.select_education_types'),
            'ELEMENTARY' => 'SD',
            'MIDDLE' => 'SMP',
            'HIGH' => 'SMA/SMK',
            'D1' => 'D1',
            'D2' => 'D2',
            'D3' => 'D3',
            'D4' => 'D4',
            'BACHELOR' => 'S1',
            'MASTER' => 'S2',
            'DOCTORAL' => 'S3'
        ];

        $family_status = [
            'ALIVE' => '-',
            'DIED' => __('system.family_status_died'),
            'MARRIED' => __('system.family_status_married'),
            'WORK' => __('system.family_status_work'),
            'ADULT' => __('system.family_status_adult'),
            'SUPPORT' => __('system.family_status_support'),
        ];

        $blood_types = [
            '' => __('system.select_blood_type'),
            'O+' => 'O+',
            'O-' => 'O-',
            'A+' => 'A+',
            'A-' => 'A-',
            'AB+' => 'AB+',
            'AB-' => 'AB-',
            'B+' => 'B+',
            'B-' => 'B-'
        ];

        return view('pages.employees.create', compact('breadcrumb', 'years', 'months', 'emergency_contact_relationships', 'salary_units', 'education_types', 'family_relationships', 'family_status', 'blood_types'));
    }

    private function months()
    {
        return [
            '01' => '01 - Januari',
            '02' => '02 - Februari',
            '03' => '03 - Maret',
            '04' => '04 - April',
            '05' => '05 - Mei',
            '06' => '06 - Juni',
            '07' => '07 - Juli',
            '08' => '08 - Agustus',
            '09' => '09 - September',
            '10' => '10 - Oktober',
            '11' => '11 - November',
            '12' => '12 - Desember'
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated  = $request->validate([
            'employee_id' => ['required', 'max:12'],
            'first_name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:30'],
            'middle_name' => ['nullable', 'regex:/^[a-zA-Z\s]+$/', 'max:30'],
            'last_name' => ['nullable', 'regex:/^[a-zA-Z\s]+$/', 'max:30'],
            'sex' => ['required', 'in:F,M'],
            'birth_place' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:30'],
            'birth_date' => ['required', 'date_format:d/m/Y'],
            'marital_status' => ['required', 'in:SINGLE,MARRIED,WIDOWER,WIDOW'],
            'religion' => ['required', 'in:BUDDHIST,CATHOLIC,CHRISTIAN,HINDU,ISLAM,CONFUCIANISM,NONE'],
            'employee_type' => ['required', 'in:LOCAL,EXPATRIATE'],
            'blood_type' => ['nullable', 'in:O+,O-,A+,A-,AB+,AB-,B+,B-'],
            'id_number' => ['required', 'max:30'],

            'current_address' => ['required_unless:address_is_same,1', 'max:255'],
            'current_village' => ['required_unless:address_is_same,1', 'max:30'],
            'current_subdistrict' => ['required_unless:address_is_same,1', 'max:30'],
            'current_city' => ['required_unless:address_is_same,1', 'max:30'],
            'id_address' => ['required', 'max:30'],
            'id_village' => ['required', 'max:30'],
            'id_subdistrict' => ['required', 'max:30'],
            'id_city' => ['required', 'max:30'],

            'home_phone' => ['nullable', 'max:45', 'regex:/^[0-9]+$/'],
            'mobile_phone' => ['required', 'max:45', 'regex:/^[0-9]+$/'],
            'email_address' => ['required', 'email', 'max:255'],

            'emergency_contact_name.*' => ['nullable', 'required_with:emergency_contact_relationship.*,emergency_contact_phone.*', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'emergency_contact_relationship.*' => ['nullable', 'required_with:emergency_contact_name.*,emergency_contact_phone.*', 'max:30'],
            'emergency_contact_phone.*' => ['nullable', 'required_with:emergency_contact_name.*,emergency_contact_relationship.*', 'max:45', 'regex:/^[0-9]+$/'],

            'education_type.*' => ['nullable', 'required_with:education_date_aquired.*,education_grade.*,education_school_name.*,education_city.*', 'in:ELEMENTARY,MIDDLE,HIGH,D1,D2,D3,D4,BACHELOR,MASTER,MASTER'],
            'education_date_aquired.*' => ['nullable', 'required_with:education_type.*,education_grade.*,education_school_name.*,education_city.*', 'date_format:d/m/Y'],
            'education_grade.*' => ['nullable', 'required_with:education_type.*,education_date_aquired.*,education_school_name.*,education_city.*', 'max:10'],
            'education_school_name.*' => ['nullable', 'required_with:education_type.*,education_date_aquired.*,education_grade.*,education_city.*', 'max:100'],
            'education_city.*' => ['nullable', 'required_with:education_type.*,education_date_aquired.*,education_grade.*,education_school_name.*', 'max:50'],
            'education_certificate_number.*' => ['nullable', 'max:45'],

            'family_name.*' => ['nullable', 'required_with:family_relationship.*,family_sex.*,family_birth_date.*,family_same_company.*', 'regex:/^[a-zA-Z\s]+$/', 'max:100'],
            'family_relationship.*' => ['nullable', 'required_with:family_name.*,family_sex.*,family_birth_date.*,family_same_company.*', 'max:15'],
            'family_sex.*' => ['nullable', 'required_with:family_name.*,family_relationship.*,family_birth_date.*,family_same_company.*', 'in:F,M'],
            'family_birth_date.*' => ['nullable', 'required_with:family_name.*,family_relationship.*,family_sex.*,family_same_company.*', 'date_format:d/m/Y'],
            'family_status.*' => ['nullable', 'in:ALIVE,DIED,MARRIED,WORK,ADULT,SUPPORT'],
            'family_same_company.*' => ['nullable', 'required_with:family_name.*,family_relationship.*,family_sex.*,family_birth_date.*', 'in:Y,N'],

            'exp_company_name.*' => ['nullable', 'required_with:exp_start_date.*,exp_end_date.*,exp_end_job_title.*,exp_end_pay_rate.*,exp_company_city.*', 'max:50'],
            'exp_start_date.*' => ['nullable', 'required_with:exp_company_name.*,exp_end_date.*,exp_end_job_title.*,exp_end_pay_rate.*,exp_company_city.*', 'date_format:d/m/Y'],
            'exp_end_date.*' => ['nullable', 'required_with:exp_company_name.*,exp_start_date.*,exp_end_job_title.*,exp_end_pay_rate.*,exp_company_city.*', 'date_format:d/m/Y'],
            'exp_end_job_title.*' => ['nullable', 'required_with:exp_company_name.*,exp_start_date.*,exp_end_date.*,exp_end_pay_rate.*,exp_company_city.*', 'max:255'],
            'exp_end_pay_rate.*' => ['nullable', 'required_with:exp_company_name.*,exp_start_date.*,exp_end_date.*,exp_end_job_title.*,exp_company_city.*', 'max:20', 'regex:/^[0-9]+$/'],
            'exp_job_desc.*' => ['nullable', 'max:2048'],
            'exp_job_remarks.*' => ['nullable', 'max:2048'],
            'exp_company_city.*' => ['nullable', 'required_with:exp_company_name.*,exp_start_date.*,exp_end_date.*,exp_end_job_title.*,exp_end_pay_rate.*', 'max:50'],
            'exp_company_phone.*' => ['nullable'],

            'npwp_id' => ['nullable'],
            'npwp_city' => ['nullable'],
            'npwp_date' => ['nullable'],

            'tax_code' => ['nullable'],
            'start_date' => ['required', 'date_format:d/m/Y'],
            'final_date' => ['nullable', 'date_format:d/m/Y'],

            'basic_salary' => ['required'],
            'salary_unit' => ['required'],
            'bank_branch' => ['required'],
            'bank_city' => ['required'],
            'bank_cif' => ['nullable'],
            'bank_account_number' => ['required'],
            'bank_account_name' => ['required'],
            'nssf_occupation' => ['required'],
            'nssf_occupation_number' => ['nullable'],
            'nssf_occupation_join_year' => ['nullable'],
            'nssf_occupation_join_month' => ['nullable'],
            'nssf_health' => ['required'],
            'nssf_health_number' => ['nullable'],
            'nssf_health_join_year' => ['nullable'],
            'nssf_health_join_month' => ['nullable'],
        ]);

        Employee::create([
            'employee_id' => $request->employee_id,
            'first_name' => $request->first_name
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
