<?php

namespace App\Http\Controllers;

use App\Models\GroupShift;
use Illuminate\Http\Request;

class GroupShiftController extends Controller
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
            __('system.group_shift') => ''
        ];

        return view('pages.group-shift.index', compact('breadcrumb'));
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
        //
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
