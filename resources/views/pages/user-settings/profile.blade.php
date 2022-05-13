<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.settings')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <div class="card">
                <div class="card-header">
                    @include('admin.pages.user-settings.sections.nav')
                </div>
                <div class="card-body">
                    <form action="{{ route('user_settings.profile', 'admin.user_settings.profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-forms.text name="name" :label="__('system.profile_name')" :value="!old() ? $user->name : old('name')" />
                        <div>
                            <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>