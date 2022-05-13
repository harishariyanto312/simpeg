<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.settings')</x-slot>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/croppie/croppie.css') }}">
    @endpush

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
                    @include('admin.pages.sections.update-avatar')
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/plugins/croppie/croppie.min.js') }}"></script>
        <script src="{{ asset('assets/js/avatar.js') }}"></script>
    @endpush
</x-admin-layout>