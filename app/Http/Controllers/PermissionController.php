<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Permission;
use App\Models\GroupPermission;

class PermissionController extends Controller
{
    
    public function edit(Group $group)
    {
        $this->authorize('permission', 'system_groups_permissions');
        
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.groups') => route('groups.index'),
            __('system.edit_permissions') => ''
        ];

        $permissions = config('permissions.permissions');
        $is_restricted = $group->is_restricted;
        $group_permissions = GroupPermission::where('group_id', $group->id)->pluck('permission_key')->all();

        $groups_checked = [];
        $subgroups_checked = [];
        foreach ($permissions as $permission_group) {
            $groups_checked[$permission_group['key']] = true;
            foreach ($permission_group['children'] as $permission_subgroup) {
                $subgroups_checked[$permission_subgroup['key']] = true;
                foreach ($permission_subgroup['children'] as $permission_item) {
                    if (!in_array($permission_item['key'], $group_permissions)) {
                        $groups_checked[$permission_group['key']] = false;
                        $subgroups_checked[$permission_subgroup['key']] = false;
                    }
                }
            }
        }

        return view('pages.groups.permissions', compact('breadcrumb', 'group', 'permissions', 'is_restricted', 'group_permissions', 'groups_checked', 'subgroups_checked'));
    }

    public function update(Request $request, Group $group)
    {
        $this->authorize('permission', 'system_groups_permissions');

        if ($group->id != 1) {

            $is_restricted = $request->is_restricted;

            GroupPermission::where('group_id', $group->id)->delete();

            if ($is_restricted == 'N') {

                $group->update(['is_restricted' => 'N']);

            }
            else {

                $group->update(['is_restricted' => 'Y']);

                $all_permissions = Permission::get()->pluck('key')->all();
                $permissions = $request->input('permissions');
                $group_id = $group->id;

                if (is_array($permissions)) {
                    
                    $permissions = collect($permissions);
                    $permissions_filtered = $permissions->filter(function ($value) use ($all_permissions) {
                        return in_array($value, $all_permissions);
                    })->map(function ($item) use ($group_id) {
                        return ['group_id' => $group_id, 'permission_key' => $item];
                    })->all();

                    GroupPermission::insert($permissions_filtered);

                }

            }

            $request->session()->flash('status', __('system.saved'));

        }

        return redirect()->route('groups.permissions', ['group' => $group]);
    }

}
