<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeStatus;

class EmployeeStatusController extends Controller
{
    private $item_limit = 25;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.employee_status') => ''
        ];

        return view('pages.employee-status.index', compact('breadcrumb'));
    }

    public function jsonIndex(Request $request)
    {
        $params_offset = $request->query('offset', 0);
        $params_limit = $request->query('limit', $this->item_limit);
        $params_sort = $request->query('sort', 'status');
        $params_order = $request->query('order', 'asc');

        $employee_status_total = EmployeeStatus::count();

        $rows = [];

        if ($params_sort == 'status') {
            $params_sort = 'status';
        }

        $employee_status = EmployeeStatus::orderBy($params_sort, $params_order);

        $employee_status_filtered = $employee_status->count();

        $employee_status = $employee_status->skip($params_offset)
            ->take($params_limit)
            ->get();

        foreach ($employee_status as $employee_status_item) {
            $rows[] = [
                'status' => strtoupper($employee_status_item->status),
                'has_end_date' => strtoupper($employee_status_item->has_end_date == 'Y' ? __('system.y') : __('system.n')),
                'menu' => view('pages.employee-status.row-menu', ['employee_status_item' => $employee_status_item])->render()
            ];
        }

        return [
            'total' => $employee_status_filtered,
            'totalNotFiltered' => $employee_status_total,
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
            __('system.employee_status') => route('employee-status.index'),
            __('system.employee_status_create') => ''
        ];

        return view('pages.employee-status.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:28']
        ]);

        if ($request->has_end_date == 'Y') {
            $has_end_date = 'Y';
        }
        else {
            $has_end_date = 'N';
        }

        EmployeeStatus::create([
            'status' => $request->name,
            'has_end_date' => $has_end_date
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('employee-status.create');
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
    public function edit(Request $request, EmployeeStatus $employee_status)
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.employee_status') => route('employee-status.index'),
            __('system.employee_status_edit') => ''
        ];

        return view('pages.employee-status.edit', compact('breadcrumb', 'employee_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeStatus $employee_status)
    {
        $validated = $request->validate([
            'name' => ['required']
        ]);

        if ($request->has_end_date == 'Y') {
            $has_end_date = 'Y';
        }
        else {
            $has_end_date = 'N';
        }

        $employee_status->update([
            'status' => $request->name,
            'has_end_date' => $has_end_date
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('employee-status.edit', ['employee_status' => $employee_status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EmployeeStatus $employee_status)
    {
        $employee_status->delete();
        $request->session()->flash('status', __('system.deleted'));
        return redirect()->back();
    }
}
