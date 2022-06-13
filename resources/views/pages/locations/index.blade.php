<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.locations')</x-slot>

    @if (session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <div></div>
        <div>
            <a href="{{ route('locations.create') }}" class="btn btn-primary">@lang('system.locations_create')</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table
                id="mainTable"
                data-toggle="table"
                data-url="{{ route('locations.index.json') }}"
                data-side-pagination="server"
                data-pagination="true"
                data-page-size="10">
                <thead>
                    <tr>
                        <th data-field="location" data-sortable="true">@lang('system.location_location')</th>
                        <th data-field="menu" data-align="center">@lang('system.menu')</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <x-modal-delete :item="__('system.location')"></x-modal-delete>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tables/bootstrap-table.min.css') }}">
        <style>
            th, td {
                white-space: nowrap;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/plugins/bootstrap-tables/bootstrap-table.min.js') }}"></script>
        <script src="{{ asset('assets/js/admin/delete-datatables.js') }}" defer></script>
        <script>
            $('#mainTable').bootstrapTable({
                onLoadSuccess: () => {
                    attachEventHandler();
                }
            });
        </script>
    @endpush
</x-admin-layout>