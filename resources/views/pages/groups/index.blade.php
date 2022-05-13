<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.groups')</x-slot>

    @if (session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <div class="text-right mb-3">
        @can('permission', 'system_groups_create')
            <a href="{{ route('groups.create') }}" class="btn btn-primary">@lang('system.groups_create')</a>
        @endcan
    </div>

    <div class="row">
        @foreach ($groups as $group)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                <x-card class="w-100">
                    <div class="h-100 d-flex flex-column">
                        <div class="mb-3">
                            <div class="h6">{{ $group->name }}</div>
                        </div>
                        <div class="mt-auto">
                            <div class="dropdown">
                                <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $group->id }}" data-toggle="dropdown" aria-expanded="false">
                                    @lang('system.menu')
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $group->id }}">
                                    @can('permission', 'system_groups_edit')
                                        <a href="{{ route('groups.edit', ['group' => $group]) }}" class="dropdown-item">@lang('system.edit')</a>
                                    @endcan

                                    @if ($group->id != 1)
                                        @can('permission', 'system_groups_permissions')
                                            <a href="{{ route('groups.permissions', ['group' => $group]) }}" class="dropdown-item">@lang('system.edit_permissions')</a>
                                        @endcan
                                    @endif

                                    @if ($group->is_removable == 'Y')
                                        @can('permission', 'system_groups_destroy')
                                            <button class="btn btn-link dropdown-item" type="button" data-toggle="modal" data-target="#modalDelete" data-delete="{{ route('groups.destroy', ['group' => $group]) }}">@lang('system.delete')</button>
                                        @endcan
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        @endforeach
    </div>

    <x-modal-delete :item="__('system.group')"></x-modal-delete>

    @push('scripts')
        <script src="{{ asset('assets/js/admin/delete.js') }}" defer></script>
    @endpush
</x-admin-layout>