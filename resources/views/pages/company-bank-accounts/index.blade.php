<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.company_bank_accounts')</x-slot>

    @if (session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <div></div>
        <div>
            <a href="{{ route('company-bank-accounts.create') }}" class="btn btn-primary">@lang('system.company_bank_accounts_create')</a>
        </div>
    </div>
</x-admin-layout>