<?php

namespace App\Http\Controllers;

use App\Models\GroupShift;
use Illuminate\Http\Request;

class GroupShiftController extends Controller
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
            __('system.group_shift') => ''
        ];

        return view('pages.group-shift.index', compact('breadcrumb'));
    }

    public function jsonIndex(Request $request)
    {
        $params_offset = $request->query('offset', 0);
        $params_limit = $request->query('limit', $this->item_limit);
        $params_sort = $request->query('sort', 'group_shift');
        $params_order = $request->query('order', 'asc');

        $group_shift_total = GroupShift::count();

        $rows = [];

        if ($params_sort == 'group-shift') {
            $params_sort = 'group-shift';
        }

        $group_shift = GroupShift::orderBy($params_sort, $params_order);

        $group_shift_filtered = $group_shift->count();

        $group_shift = $group_shift->skip($params_offset)
            ->take($params_limit)
            ->get();
        
        foreach ($group_shift as $group_shift_item) {
            $rows[] = [
                'group_shift' => $group_shift_item->group_shift,
                'menu' => view('pages.group-shift.row-menu', ['group_shift_item' => $group_shift_item])->render()
            ];
        }

        return [
            'total' => $group_shift_filtered,
            'totalNotFiltered' => $group_shift_total,
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
            __('system.group_shift') => route('group-shift.index'),
            __('system.group_shift_create') => ''
        ];

        return view('pages.group-shift.create', compact('breadcrumb'));
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
            'name' => ['required', 'max:15']
        ]);

        GroupShift::create([
            'group_shift' => $request->name
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('group-shift.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupShift  $groupShift
     * @return \Illuminate\Http\Response
     */
    public function show(GroupShift $groupShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupShift  $groupShift
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupShift $groupShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupShift  $groupShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupShift $groupShift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupShift  $groupShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupShift $groupShift)
    {
        //
    }
}
