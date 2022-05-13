<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Helpers\UpdateAvatar;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('permission', 'system_users_index');

        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.users') => ''
        ];

        $groups = Group::get();

        return view('pages.users.index', compact('breadcrumb', 'groups'));
    }

    public function jsonIndex(Request $request)
    {
        $this->authorize('permission', 'system_users_index');

        $params_draw = $request->query('draw', 1);
        $params_start = $request->query('start', 0);
        $params_length = $request->query('length', 25);
        $params_search = $request->query('search');
        $params_order = $request->query('order', [
            [
                'column' => 2,
                'dir' => 'desc'
            ]
        ]);

        $custom_params_filter_group = $request->query('filter_group');

        $column_mapping = [
            'username',
            'name',
            'created_at',
            'group',
            'menu',
        ];

        $users = User::when($params_search, function ($query, $params_search) {
                return $query->where(function ($q) use ($params_search) {
                    $q->where('name', 'like', '%' . $params_search['value'] . '%')->orWhere('username', 'like', '%' . $params_search['value'] . '%')->orWhere('id', $params_search['value']);
                });
            })
            ->when($custom_params_filter_group, function ($query, $custom_params_filter_group) {
                return $query->where('group_id', $custom_params_filter_group);
            });
        $users_filtered_count = $users->count();
        $users = $users->skip($params_start)
            ->orderBy($column_mapping[$params_order[0]['column']], $params_order[0]['dir'])
            ->take($params_length)
            ->get();
        
        $users_count = User::count();

        $result = [];
        foreach ($users as $user) {
            $result[] = [
                'username' => $user->username,
                'name' => $user->name,
                'group' => $user->group->name,
                'time_created' => date('d/m/Y', strtotime($user->created_at)),
                'menu' => view('pages.users.row-menu', ['user' => $user])->render()
            ];
        }

        return [
            'draw' => intval($params_draw),
            'data' => $result,
            'recordsTotal' => $users_count,
            'recordsFiltered' => $users_filtered_count,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('permission', 'system_users_create');

        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.users') => route('users.index'),
            __('system.users_create') => ''
        ];

        $groups = Group::get();
        $groups = $groups->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        });
        $groups = $groups->all();

        return view('pages.users.create', compact('breadcrumb', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('permission', 'system_users_create');

        $validated = $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/i', 'max:255'],
            'username' => ['required', 'alpha_num', 'unique:users'],
            'group' => ['required', 'exists:groups,id'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::create([
            'name' => $request->name,
            'group_id' => $request->group,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email_verified_at' => ($request->is_verified == '1' ? date('Y-m-d H:i:s') : null)
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('permission', 'system_users_edit');

        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.users') => route('users.index'),
            __('system.users_edit') => ''
        ];

        $groups = Group::get();
        $groups = $groups->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        });
        $groups = $groups->all();

        return view('pages.users.edit', compact('breadcrumb', 'user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('permission', 'system_users_edit');

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'numeric', Rule::unique('users')->ignore($user->username, 'username')],
            'group' => ['required', 'exists:groups,id']
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'group_id' => $request->group
        ]);

        if ($request->is_verified == '1') {
            if (!$user->email_verified_at) {
                $user->update([
                    'email_verified_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
        else {
            $user->update([
                'email_verified_at' => null
            ]);
        }

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('users.edit', ['user' => $user]);
    }

    public function update_password(Request $request, User $user)
    {
        $this->authorize('permission', 'system_users_edit');

        $validated = $request->validate([
            'password' => ['required', Rules\Password::defaults(), 'confirmed']
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('users.edit', ['user' => $user]);
    }

    public function update_avatar(Request $request, User $user)
    {

        $this->authorize('permission', 'system_users_edit');

        // Twin code : App\Http\Controllers\System\SettingsController

        $validated = $request->validate([
            'avatar' => ['required', 'image', 'max:2048']
        ]);

        if ($request->file('avatar')->isValid()) {

            $raw_path = 'o';

            $path = $request->file('avatar')->store('avatars-' . $raw_path, 's3');
            $abs_path = Storage::disk('s3')->url($path);

            $points = explode(',', $request->points);
            if (count($points) == 4 && $points[0] < $points[2] && $points[1] < $points[3]) {
                $image = UpdateAvatar::update($abs_path, $points[2] - $points[0], $points[3] - $points[1], $points[0], $points[1]);

                $avatar_path = str_replace('-' . $raw_path, '', $path);
                Storage::disk('s3')->put($avatar_path, $image);
                $avatar_abs_path = Storage::disk('s3')->url($avatar_path);
            }

            Storage::disk('s3')->delete($user->avatar_path);
            Storage::disk('s3')->delete($user->avatar_raw_path);

            $user->update([
                'avatar' => $avatar_abs_path,
                'avatar_path' => $avatar_path,
                'avatar_raw' => $abs_path,
                'avatar_raw_path' => $path
            ]);

            $request->session()->flash('status', __('system.saved'));

        }

        return redirect()->route('users.edit', ['user' => $user]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $this->authorize('permission', 'system_users_delete');

        if ($user->id != $request->user()->id) {
            $user->delete();
            $request->session()->flash('status', __('system.deleted'));
        }

        return redirect()->back();
    }
}
