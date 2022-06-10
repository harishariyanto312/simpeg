<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.titles')</x-slot>

    @if (session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <div></div>
        <div>
            <a href="{{ route('titles.create') }}" class="btn btn-primary">@lang('system.titles_create')</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table
                id="mainTable"
                data-url=""
                data-side-pagination="server"
                data-pagination="true"
                data-page-size="10">

            </table>
        </div>
    </div>
</x-admin-layout>