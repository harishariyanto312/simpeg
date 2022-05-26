<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmergencyContact;
use App\Models\EmployeeEducation;
use App\Models\EmployeeFamily;
use App\Models\EmployeeWorkExperience;

class EmployeeController extends Controller
{
    private $item_limit = 10;

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
        $params_offset = $request->query('offset', 0);
        $params_limit = $request->query('limit', $this->item_limit);
        $params_sort = $request->query('sort', 'name');
        $params_order = $request->query('order', 'asc');
        $params_search = $request->query('search');

        $employees_total = Employee::count();

        $rows = [];

        if ($params_sort == 'name') {
            $params_sort = 'full_name';
        }

        $employees = Employee::when($params_search, function ($query, $params_search) {
                return $query->where(function ($q) use ($params_search) {
                    $q->where('full_name', 'like', '%' . $params_search . '%');
                });
            });
        
        $employees_filtered = $employees->count();
       
        $employees = $employees->orderBy($params_sort, $params_order)
            ->skip($params_offset)
            ->take($params_limit)
            ->get();
        foreach ($employees as $employee) {
            $rows[] = [
                'name' => $employee->full_name,
                'employee_id' => $employee->employee_id,
                'sex' => $employee->sex(),
                'birth_place' => $employee->birth_place,
                'date_of_birth' => $employee->date_of_birth(),
                'marital_status' => $employee->marital_status(),
                'religion' => $employee->religion(),
                'employee_type' => $employee->employee_type(),
                'blood_type' => $employee->blood_type,
                'id_number' => $employee->id_number,
                'id_address' => $employee->id_address,
                'id_village' => $employee->id_village,
                'id_subdistrict' => $employee->id_subdistrict,
                'id_city' => $employee->id_city,
                'current_address' => $employee->current_address,
                'current_village' => $employee->current_village,
                'current_subdistrict' => $employee->current_subdistrict,
                'current_city' => $employee->current_city,
                'home_phone' => $employee->home_phone,
                'mobile_phone' => $employee->mobile_phone,
                'email_address' => $employee->email_address,
                'npwp_id' => $employee->npwp_id,
                'npwp_city' => $employee->npwp_city,
                'npwp_date' => $employee->npwp_date(),
                'tax_code' => $employee->tax_code,
                'start_date' => $employee->start_date,
                'final_date' => $employee->final_date,
                'basic_salary' => $employee->basic_salary(),
                'salary_unit' => $employee->salary_unit(),
            ];
        }

        return [
            'total' => $employees_filtered,
            'totalNotFiltered' => $employees_total,
            'rows' => $rows
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
            '' => __('system.select_month'),
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

        // dd($request->all());

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
            'exp_company_phone.*' => ['nullable', 'max:20', 'regex:/^[0-9]+$/'],

            'npwp_id' => ['nullable', 'max:20'],
            'npwp_city' => ['nullable', 'max:50'],
            'npwp_date' => ['nullable', 'date_format:d/m/Y'],

            'always_present' => ['required', 'in:Y,N'],

            'tax_code' => ['nullable', 'max:30'],
            'start_date' => ['required', 'date_format:d/m/Y'],
            'final_date' => ['nullable', 'date_format:d/m/Y'],

            'basic_salary' => ['required', 'regex:/^[0-9]+$/'],
            'salary_unit' => ['required', 'in:MONTH,WEEK,DAY,HOUR,MINUTE'],
            'bank_branch' => ['required', 'max:45'],
            'bank_city' => ['required', 'max:30'],
            'bank_cif' => ['nullable', 'max:50'],
            'bank_account_number' => ['required', 'max:30'],
            'bank_account_name' => ['required', 'max:100'],

            'nssf_occupation' => ['required', 'in:Y,N'],
            'nssf_occupation_number' => ['nullable', 'required_if:nssf_occupation,Y', 'max:30'],
            'nssf_occupation_join_year' => ['nullable', 'required_if:nssf_occupation,Y', 'date_format:Y'],
            'nssf_occupation_join_month' => ['nullable', 'required_if:nssf_occupation,Y', 'date_format:m'],

            'nssf_health' => ['required', 'in:Y,N'],
            'nssf_health_number' => ['nullable', 'required_if:nssf_health,Y', 'max:30'],
            'nssf_health_join_year' => ['nullable', 'required_if:nssf_health,Y', 'date_format:Y'],
            'nssf_health_join_month' => ['nullable', 'required_if:nssf_health,Y', 'date_format:m'],
        ]);

        $employee = Employee::create([
            'employee_id' => $request->employee_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'full_name' => $request->first_name . (empty($request->middle_name) ? '' : ' ' . $request->middle_name) . (empty($request->last_name) ? '' : ' ' . $request->last_name),
            'sex' => $request->sex,
            'birth_place' => $request->birth_place,
            'date_of_birth' => $this->changeToDate($request->birth_date),
            'marital_status' => $request->marital_status,
            'religion' => $request->religion,
            'employee_type' => $request->employee_type,
            'blood_type' => $request->blood_type,
            'id_number' => $request->id_number,
            'id_address' => $request->id_address,
            'id_village' => $request->id_village,
            'id_subdistrict' => $request->id_subdistrict,
            'id_city' => $request->id_city,
            'current_address' => $request->address_is_same == '1' ? $request->id_address : $request->current_address,
            'current_village' => $request->address_is_same == '1' ? $request->id_village : $request->current_village,
            'current_subdistrict' => $request->address_is_same == '1' ? $request->id_subdistrict : $request->current_subdistrict,
            'current_city' => $request->address_is_same == '1' ? $request->id_city : $request->current_city,
            'home_phone' => $request->home_phone,
            'mobile_phone' => $request->mobile_phone,
            'email_address' => $request->email_address,
            'npwp_id' => $request->npwp_id,
            'npwp_city' => $request->npwp_city,
            'npwp_date' => $this->changeToDate($request->npwp_date),
            'always_present' => $request->always_present,
            'tax_code' => $request->tax_code,
            'start_date' => $this->changeToDate($request->start_date),
            'final_date' => $this->changeToDate($request->final_date),
            'basic_salary' => $request->basic_salary,
            'unit' => $request->salary_unit,
            'bank_branch' => $request->bank_branch,
            'bank_city' => $request->bank_city,
            'cif' => $request->bank_cif,
            'bank_account_number' => $request->bank_account_number,
            'bank_account_name' => $request->bank_account_name,
            'nssf_occupation' => $request->nssf_occupation,
            'nssf_occupation_number' => $request->nssf_occupation_number,
            'nssf_occupation_join_date' => $request->nssf_occupation_join_year . '/' . $request->nssf_occupation_join_month,
            'nssf_health' => $request->nssf_health,
            'nssf_health_number' => $request->nssf_health_number,
            'nssf_health_join_date' => $request->nssf_health_join_year . '/' . $request->nssf_health_join_month
        ]);

        $emergency_contacts = [];
        foreach ($request->emergency_contact_name as $number => $emergency_contact_name) {
            if (!empty($emergency_contact_name)) {
                $emergency_contacts[] = new EmergencyContact([
                    'emergency_contact_name' => $emergency_contact_name,
                    'emergency_contact_relationship' => $request->emergency_contact_relationship[$number],
                    'emergency_contact_phone' => $request->emergency_contact_phone[$number]
                ]);
            }
        }
        $employee->emergency_contacts()->saveMany($emergency_contacts);

        $employee_educations = [];
        foreach ($request->education_type as $number => $education_type) {
            if (!empty($education_type)) {
                $employee_educations[] = new EmployeeEducation([
                    'type' => $education_type,
                    'date_aquired' => $this->changeToDate($request->education_date_aquired[$number]),
                    'grade' => $request->education_grade[$number],
                    'school_name' => $request->education_school_name[$number],
                    'city' => $request->education_city[$number],
                    'certificate_number' => $request->education_certificate_number[$number]
                ]);
            }
        }
        $employee->employee_educations()->saveMany($employee_educations);

        $employee_families = [];
        foreach ($request->family_name as $number => $family_name) {
            if (!empty($family_name)) {
                $employee_families[] = new EmployeeFamily([
                    'name' => $family_name,
                    'relationship' => $request->family_relationship[$number],
                    'sex' => $request->family_sex[$number],
                    'date_of_birth' => $this->changeToDate($request->family_birth_date[$number]),
                    'status' => $request->family_status[$number],
                    'same_company' => $request->family_same_company[$number]
                ]);
            }
        }
        $employee->employee_families()->saveMany($employee_families);

        $employee_work_experiences = [];
        foreach ($request->exp_company_name as $number => $exp_company_name) {
            if (!empty($exp_company_name)) {
                $employee_work_experiences[] = new EmployeeWorkExperience([
                    'company_name' => $exp_company_name,
                    'start_date' => $this->changeToDate($request->exp_start_date[$number]),
                    'end_date' => $this->changeToDate($request->exp_end_date[$number]),
                    'end_job_title' => $request->exp_end_job_title[$number],
                    'ending_payrate' => $request->exp_end_pay_rate[$number],
                    'job_description' => $request->exp_job_desc[$number],
                    'remarks' => $request->exp_job_remarks[$number],
                    'city' => $request->exp_company_city[$number],
                    'phone' => $request->exp_company_phone[$number]
                ]);
            }
        }
        $employee->employee_work_experiences()->saveMany($employee_work_experiences);

        return redirect()->route('employees.index');
    }

    private function changeToDate($date)
    {
        if (!empty(trim($date))) {
            return date_format(date_create_from_format('d/m/Y', $date), 'Y-m-d');
        }
        return $date;
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
