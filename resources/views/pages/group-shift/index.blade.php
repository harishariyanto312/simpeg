<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.group_shift')</x-slot>

    @if (session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <div></div>
        <div>
            <a href="{{ route('group-shift.create') }}" class="btn btn-primary">@lang('system.group_shift_create')</a>
        </div>
    </div>
</x-admin-layout>