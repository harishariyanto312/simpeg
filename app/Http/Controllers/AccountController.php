<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
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
            __('system.accounts') => ''
        ];

        return view('pages.accounts.index', compact('breadcrumb'));
    }

    public function jsonIndex(Request $request)
    {
        $params_offset = $request->query('offset', 0);
        $params_limit = $request->query('limit', $this->item_limit);
        $params_sort = $request->query('sort', 'account');
        $params_order = $request->query('order', 'asc');

        $accounts_total = Account::count();

        $rows = [];

        if ($params_sort == 'account') {
            $params_sort = 'account';
        }

        $accounts = Account::orderBy($params_sort, $params_order);

        $accounts_filtered = $accounts->count();

        $accounts = $accounts->skip($params_offset)
            ->take($params_limit)
            ->get();
        
        foreach ($accounts as $account) {
            $rows[] = [
                'account' => strtoupper($account->account),
                'menu' => view('pages.accounts.row-menu', ['account' => $account])->render()
            ];
        }

        return [
            'total' => $accounts_total,
            'totalNotFiltered' => $accounts_filtered,
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
            __('system.accounts') => route('accounts.index'),
            __('system.accounts_create') => ''
        ];

        return view('pages.accounts.create', compact('breadcrumb'));
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
            'account' => ['required', 'max:64']
        ]);

        Account::create([
            'account' => $request->account
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('accounts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.accounts') => route('accounts.index'),
            __('system.accounts_edit') => ''
        ];

        return view('pages.accounts.edit', compact('breadcrumb', 'account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $validated = $request->validate([
            'account' => ['required', 'max:64']
        ]);

        $account->update([
            'account' => $request->account
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('accounts.edit', ['account' => $account]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Account $account)
    {
        $account->delete();
        $request->session()->flash('status', __('system.deleted'));
        return redirect()->back();
    }
}
