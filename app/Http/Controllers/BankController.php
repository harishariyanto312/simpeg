<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
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
            __('system.banks') => ''
        ];

        return view('pages.banks.index', compact('breadcrumb'));
    }

    public function jsonIndex(Request $request)
    {
        $params_offset = $request->query('offset', 0);
        $params_limit = $request->query('limit', $this->item_limit);
        $params_sort = $request->query('sort', 'bank');
        $params_order = $request->query('order', 'asc');

        $banks_total = Bank::count();

        $rows = [];

        if ($params_sort == 'bank') {
            $params_sort = 'bank';
        }

        $banks = Bank::orderBy($params_sort, $params_order);

        $banks_filtered = $banks->count();

        $banks = $banks->skip($params_offset)
            ->take($params_limit)
            ->get();
        
        foreach ($banks as $bank) {
            $rows[] = [
                'bank' => strtoupper($bank->bank),
                'menu' => view('pages.banks.row-menu', ['bank' => $bank])->render()
            ];
        }

        return [
            'total' => $banks_total,
            'totalNotFiltered' => $banks_filtered,
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
            __('system.banks') => route('banks.index'),
            __('system.banks_create') => ''
        ];

        return view('pages.banks.create', compact('breadcrumb'));
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
            'bank' => ['required', 'max:64']
        ]);

        Bank::create([
            'bank' => $request->bank
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('banks.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.banks') => route('banks.index'),
            __('system.banks_edit') => ''
        ];

        return view('pages.banks.edit', compact('breadcrumb', 'bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $validated = $request->validate([
            'bank' => ['required', 'max:64']
        ]);

        $bank->update([
            'bank' => $request->bank
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('banks.edit', ['bank' => $bank]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bank $bank)
    {
        $bank->delete();
        $request->session()->flash('status', __('system.deleted'));
        return redirect()->back();
    }
}
