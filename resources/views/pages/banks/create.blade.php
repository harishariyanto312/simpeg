<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.banks_create')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">

            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>
                <form action="{{ route('banks.store') }}" method="POST">
                    @csrf
                    <x-forms.text name="bank" :label="__('system.bank_bank')" :value="old('bank')" />
                    <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                </form>
            </x-card>

        </div>
    </div>
</x-admin-layout>