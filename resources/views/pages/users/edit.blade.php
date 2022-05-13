<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.users_edit')</x-slot>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/croppie/croppie.css') }}">
    @endpush

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <div class="row">
        <div class="col-12 col-lg-6">

            <x-card>
                <x-slot name="header">@lang('system.profile')</x-slot>

                <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <x-forms.text name="name" :label="__('system.user_name')" :value="old() ? (empty(old('name')) ? $user->name : old('name')) : $user->name" />
                    <x-forms.text name="username" :label="__('system.user_username')" :value="old() ? (empty(old('username')) ? $user->username : old('username')) : $user->username" />
                    <x-forms.select name="group" :label="__('system.user_group')" :options="$groups" :value="old() ? (empty(old('group')) ? $user->group_id : old('group')) : $user->group_id" />

                    <div>
                        <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                    </div>
                </form>
            </x-card>

        </div>
        <div class="col-12 col-lg-6">

            <x-card>
                <x-slot name="header">@lang('system.password')</x-slot>

                <form action="{{ route('users.update_password', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <x-forms.password name="password" :label="__('system.new_password')" :value="old('password')" />
                    <x-forms.password name="password_confirmation" :label="__('system.password_confirm')" :value="old('password_confirmation')" />

                    <div>
                        <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                    </div>
                </form>
            </x-card>

        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/plugins/croppie/croppie.min.js') }}"></script>
        <script src="{{ asset('assets/js/avatar.js') }}"></script>
    @endpush
</x-admin-layout>