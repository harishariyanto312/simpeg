<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.accounts_edit')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>
                <form action="{{ route('accounts.update', ['account' => $account]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-forms.text name="account" :label="__('system.account_account')" :value="old() ? old('account') : $account->account" />
                    <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>