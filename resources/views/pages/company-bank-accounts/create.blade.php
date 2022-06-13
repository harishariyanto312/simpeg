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
                    <x-forms.select name="bank_id" :label="__('system.bank_bank')" :options="$banks" :value="old('bank_id')" />
                    <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                </form>
            </x-card>

        </div>
    </div>
</x-admin-layout>