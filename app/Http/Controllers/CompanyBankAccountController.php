<?php

namespace App\Http\Controllers;

use App\Models\CompanyBankAccount;
use Illuminate\Http\Request;
use App\Models\Bank;

class CompanyBankAccountController extends Controller
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
            __('system.company_bank_accounts') => ''
        ];

        return view('pages.company-bank-accounts.index', compact('breadcrumb'));
    }

    public function jsonIndex(Request $request)
    {
        $params_offset = $request->query('offset', 0);
        $params_limit = $request->query('limit', $this->item_limit);
        $params_sort = $request->query('sort', 'id');
        $params_order = $request->query('order', 'asc');

        $company_bank_accounts_total = CompanyBankAccount::count();

        $rows = [];

        if ($params_sort == 'id') {
            $params_sort = 'id';
        }

        $company_bank_accounts = CompanyBankAccount::orderBy($params_sort, $params_order);

        $company_bank_accounts_filtered = $company_bank_accounts->count();

        $company_bank_accounts = $company_bank_accounts->skip($params_offset)
            ->take($params_limit)
            ->get();
        
        foreach ($company_bank_accounts as $company_bank_account) {
            $rows[] = [
                'bank' => strtoupper($company_bank_account->bank->bank),
                'bank_branch' => $company_bank_account->bank_branch,
                'bank_city' => $company_bank_account->bank_city,
                'cif' => $company_bank_account->cif,
                'bank_account_number' => $company_bank_account->bank_account_number,
                'bank_account_name' => $company_bank_account->bank_account_name,
                'menu' => ''
            ];
        }

        return [
            'total' => $company_bank_accounts_total,
            'totalNotFiltered' => $company_bank_accounts_filtered,
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
            __('system.company_bank_accounts') => route('company-bank-accounts.index'),
            __('system.company_bank_accounts_create') => ''
        ];

        $banks = $this->banks();

        return view('pages.company-bank-accounts.create', compact('breadcrumb', 'banks'));
    }

    public function banks()
    {
        $banks = Bank::get();
        $rows = [];
        $rows[0] = __('system.select_bank');
        foreach ($banks as $bank) {
            $rows[$bank->id] = strtoupper($bank->bank);
        }
        return $rows;
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
            'bank_id' => ['required', 'exists:banks,id'],
            'bank_branch' => ['required', 'max:45'],
            'bank_city' => ['required', 'max:30'],
            'bank_cif' => ['nullable', 'max:50'],
            'bank_account_number' => ['required', 'max:30'],
            'bank_account_name' => ['required', 'max:100'],
        ]);

        CompanyBankAccount::create([
            'bank_id' => $request->bank_id,
            'bank_branch' => $request->bank_branch,
            'bank_city' => $request->bank_city,
            'cif' => $request->bank_cif,
            'bank_account_number' => $request->bank_account_number,
            'bank_account_name' => $request->bank_account_name
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyBankAccount  $companyBankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyBankAccount $companyBankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyBankAccount  $companyBankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyBankAccount $companyBankAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyBankAccount  $companyBankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyBankAccount $companyBankAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyBankAccount  $companyBankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyBankAccount $companyBankAccount)
    {
        //
    }
}
