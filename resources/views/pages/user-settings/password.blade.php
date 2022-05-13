<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.change_password')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            
            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>
                <form action="{{ route('change_password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <x-forms.password name="current_password" :label="__('system.current_password')" :value="old('current_password')" />
                    <x-forms.password name="password" :label="__('system.new_password')" :value="old('password')" />
                    <x-forms.password name="password_confirmation" :label="__('system.password_confirm')" :value="old('password_confirmation')" />

                    <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>