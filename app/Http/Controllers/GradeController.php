<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
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
            __('system.grades') => ''
        ];

        return view('pages.grades.index', compact('breadcrumb'));
    }

    public function jsonIndex(Request $request)
    {
        $params_offset = $request->query('offset', 0);
        $params_limit = $request->query('limit', $this->item_limit);
        $params_sort = $request->query('sort', 'grade');
        $params_order = $request->query('order', 'asc');

        $grades_total = Grade::count();

        $rows = [];

        if ($params_sort == 'grade') {
            $params_sort = 'grade';
        }
        elseif ($params_sort == 'code') {
            $params_sort = 'code';
        }

        $grades = Grade::orderBy($params_sort, $params_order);

        $grades_filtered = $grades->count();

        $grades = $grades->skip($params_offset)
            ->take($params_limit)
            ->get();
        
        foreach ($grades as $grade) {
            $rows[] = [
                'grade' => strtoupper($grade->grade),
                'code' => strtoupper($grade->code),
                'menu' => view('pages.grades.row-menu', ['grade' => $grade])->render()
            ];
        }

        return [
            'total' => $grades_filtered,
            'totalNotFiltered' => $grades_total,
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
            __('system.grades') => route('grades.index'),
            __('system.grades_create') => ''
        ];

        return view('pages.grades.create', compact('breadcrumb'));
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
            'grade' => ['required', 'max:32'],
            'code' => ['required', 'max:5']
        ]);

        Grade::create([
            'grade' => $request->grade,
            'code' => $request->code
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('grades.create');
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
    public function edit(Grade $grade)
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.grades') => route('grades.index'),
            __('system.grades_edit') => ''
        ];

        return view('pages.grades.edit', compact('breadcrumb', 'grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'grade' => ['required', 'max:32'],
            'code' => ['required', 'max:5']
        ]);

        $grade->update([
            'grade' => $request->grade,
            'code' => $request->code
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('grades.edit', ['grade' => $grade]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Grade $grade)
    {
        $grade->delete();
        $request->session()->flash('status', __('system.deleted'));
        return redirect()->back();
    }
}
