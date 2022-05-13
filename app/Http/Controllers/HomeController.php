<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
        return view('index');
    }

    public function editPassword(Request $request)
    {
        if ($request->user()->group->is_restricted == 'READONLY') {
            $breadcrumb = [
                __('system.home') => route('index'),
                __('system.change_password') => ''
            ];
            return view('pages.readonly.change-password', compact('breadcrumb'));
        }
        else {
            $breadcrumb = [
                __('system.admin_control_panel') => route('index'),
                __('system.change_password') => ''
            ];
            return view('pages.user-settings.password', compact('breadcrumb'));
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'password'],
            'password' => ['required', Rules\Password::defaults(), 'confirmed']
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password)
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->back();
    }

}
