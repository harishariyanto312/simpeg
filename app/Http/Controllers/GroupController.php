<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('permission', 'system_groups_index');

        $groups = Group::get();

        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.groups') => ''
        ];

        return view('pages.groups.index', compact('breadcrumb', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('permission', 'system_groups_create');

        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.groups') => route('groups.index'),
            __('system.groups_create') => ''
        ];

        return view('pages.groups.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('permission', 'system_groups_create');

        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:32', 'unique:groups,name']
        ]);

        Group::create($validated);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('groups.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Group $group)
    {
        $this->authorize('permission', 'system_groups_edit');

        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.groups') => route('groups.index'),
            __('system.groups_edit') => ''
        ];

        return view('pages.groups.edit', compact('breadcrumb', 'group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->authorize('permission', 'system_groups_edit');

        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:32', Rule::unique('groups', 'name')->ignore($group->id, 'id')]
        ]);

        $group->update($validated);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('groups.edit', ['group' => $group]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Group $group)
    {
        $this->authorize('permission', 'system_groups_destroy');
        
        $is_removable = $group->is_removable;
        $users_in_this_role = User::where('group_id', $group->id)->count();

        if ($is_removable == 'Y') {

            if ($users_in_this_role == 0) {

                $group->delete();
                $request->session()->flash('status', __('system.item_deleted', ['item' => __('system.group')]));

            }
            else {
                $request->session()->flash('error', __('system.group_has_users'));
            }

        }
        else {
            $request->session()->flash('error', __('system.group_not_removable'));
        }

        return redirect()->route('groups.index');

    }
}
