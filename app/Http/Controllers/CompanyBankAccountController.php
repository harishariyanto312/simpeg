<?php

namespace App\Http\Controllers;

use App\Models\CompanyBankAccount;
use Illuminate\Http\Request;
use App\Models\Bank;

class CompanyBankAccountController extends Controller
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
            __('system.company_bank_accounts') => ''
        ];

        return view('pages.company-bank-accounts.index', compact('breadcrumb'));
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
        $rows[0] = '';
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
        //
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
