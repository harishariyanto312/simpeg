<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.group_shift_create')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif
        </div>
    </div>
</x-admin-layout>