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
        ];

        $salary_units = [
            'MONTH' => __('system.salary_unit_month'),
            'WEEK' => __('system.salary_unit_week'),
            'DAY' => __('system.salary_unit_day'),
            'HOUR' => __('system.salary_unit_hour'),
            'MINUTE' => __('system.salary_unit_minute'),
        ];

        return view('pages.employees.create', compact('breadcrumb', 'years', 'months', 'emergency_contact_relationships', 'salary_units'));
    }

    private function months()
    {
        return [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
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
        $address = [];
        $address['detail'] = $request->address_detail;
        $address['rt'] = $request->address_rt;
        $address['rw'] = $request->address_rw;
        $address['desa'] = $request->address_desa;
        $address['kecamatan'] = $request->address_kecamatan;
        $address['kota'] = $request->address_kota;
        $address = json_encode($address);

        $employee = Employee::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'birth_month' => $request->birth_month,
            'birth_year' => $request->birth_year,
            'gender' => $request->gender,
            'address' => $address
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('employees.create');
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
