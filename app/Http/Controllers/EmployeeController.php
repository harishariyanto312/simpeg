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
            'employee_id' => ['required'],
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['nullable'],
            'sex' => ['required'],
            'birth_place' => ['required'],
            'birth_date' => ['required'],
            'marital_status' => ['required'],
            'religion' => ['required'],
            'employee_type' => ['required'],
            'blood_type' => ['nullable'],
            'id_number' => ['required'],
            'current_address' => ['required'],
            'current_village' => ['required'],
            'current_subdistrict' => ['required'],
            'current_city' => ['required']
        ]);
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
