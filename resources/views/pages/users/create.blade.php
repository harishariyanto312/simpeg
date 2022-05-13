<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.users_create')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">

            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <x-forms.text name="name" :label="__('system.user_name')" :value="old('name')" />
                    <x-forms.text name="username" :label="__('system.user_username')" :value="old('username')" />
                    <x-forms.select name="group" :label="__('system.user_group')" :options="$groups" :value="old('group')" />
                    <x-forms.password name="password" :label="__('system.user_password')" :value="old('password')" />
                    <x-forms.password name="password_confirmation" :label="__('system.user_password_confirm')" :value="old('password_confirmation')" />

                    <div>
                        <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                    </div>
                </form>

            </x-card>
        </div>
    </div>
</x-admin-layout>