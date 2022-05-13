<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.employees')</x-slot>

    @if (session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <div></div>
        <div>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">@lang('system.employees_create')</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table id="mainTable" class="table table-hover table-bordered text-nowrap w-100 table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>@lang('system.employee_nip_short')</th>
                        <th>@lang('system.employee_name')</th>
                        <th>@lang('system.employee_gender')</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/js/admin/delete-datatables.js') }}" defer></script>
        <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
        <script defer>
            const mainTable = new DataTable('#mainTable', {
                ajax: {
                    url: '{{ route('employees.index.json') }}',
                    dataSrc: 'data',
                },
                columns: [
                    { data : 'nip', className : 'align-middle' },
                    { data : 'name', className : 'align-middle' },
                    { data : 'gender', className : 'align-middle' },
                ],
                serverSide: true,
                processing: true,
                pageLength: 25,
                stateSave: false,
            });
        </script>
    @endpush
</x-admin-layout>