<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.users')</x-slot>

    @if (session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="filterGroup" data-toggle="dropdown" aria-expanded="false" data-filter-group-selected="0">
                    @lang('system.group')
                    : <span id="filterGroupValue">@lang('system.all')</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterGroup">
                    <li>
                        <button class="btn btn-link dropdown-item" data-filter-group-id="0">@lang('system.all')</button>
                    </li>
                    @foreach ($groups as $group)
                        <li>
                            <button class="btn btn-link dropdown-item" data-filter-group-id="{{ $group->id }}">{{ $group->name }}</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div>
            @can('permission', 'system_users_create')
                <a href="{{ route('users.create') }}" class="btn btn-primary">@lang('system.users_create')</a>
            @endcan
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table id="mainTable" class="table table-hover table-bordered text-nowrap w-100">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 15%;">@lang('auth.username')</th>
                        <th style="width: 30%;">@lang('system.user_name')</th>
                        <th style="width: 20%;">@lang('system.date_created')</th>
                        <th style="width: 20%;">@lang('system.group')</th>
                        <th style="width: 15%;">@lang('system.menu')</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <x-modal-delete :item="__('system.user')"></x-modal-delete>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/js/admin/delete-datatables.js') }}" defer></script>
        <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
        <script defer>
            const filterGroup = document.querySelectorAll('button[data-filter-group-id]');
            const filterGroupSelected = document.getElementById('filterGroup');
            const filterGroupValue = document.getElementById('filterGroupValue');
            filterGroup.forEach(filterGroup => {
                filterGroup.addEventListener('click', e => {
                    filterGroupSelected.dataset.filterGroupSelected = e.target.dataset.filterGroupId;
                    mainTable.ajax.reload();
                    filterGroupValue.innerHTML = e.target.innerHTML;
                });
            });

            const mainTable = new DataTable('#mainTable', {
                ajax: {
                    url: '{{ route('users.index.json') }}',
                    dataSrc: 'data',
                    data : function (d) {
                        d.filter_group = filterGroupSelected.dataset.filterGroupSelected;
                    }
                },
                columns: [
                    { data : 'username', className : 'align-middle' },
                    { data : 'name', className : 'align-middle' },
                    { data : 'time_created', className : 'align-middle' },
                    { data : 'group', orderable : false, className : 'align-middle' },
                    { data : 'menu', orderable : false, className : 'text-center' }
                ],
                serverSide: true,
                processing: true,
                pageLength: 25,
                order: [
                    [2, 'desc']
                ],
                stateSave: false,
                fnDrawCallback: () => {
                    attachEventHandler();
                }
            });
        </script>
    @endpush
</x-admin-layout>