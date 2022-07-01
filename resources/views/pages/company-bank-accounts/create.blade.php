<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.company_bank_accounts_create')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">

            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>
                <form action="{{ route('company-bank-accounts.store') }}" method="POST">
                    @csrf
                    <x-forms.select name="bank_id" :label="__('system.bank_bank')" :options="$banks" :value="old('bank_id')" :is-required="true" />
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <x-forms.text name="bank_branch" :label="__('system.bank_branch')" :value="old('bank_branch')" :is-required="true" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <x-forms.text name="bank_city" :label="__('system.bank_city')" :value="old('bank_city')" :is-required="true" />
                        </div>
                    </div>
                    <x-forms.text name="bank_cif" :label="__('system.bank_cif')" :value="old('bank_cif')" />
                    <x-forms.text name="bank_account_number" :label="__('system.bank_account_number')" :value="old('bank_account_number')" :is-required="true" />
                    <x-forms.text name="bank_account_name" :label="__('system.bank_account_name')" :value="old('bank_account_name')" :is-required="true" />
                    <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                </form>
            </x-card>

        </div>
    </div>
</x-admin-layout>