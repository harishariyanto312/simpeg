<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">{{ $group->name }}</x-slot>

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <form action="{{ route('groups.permissions', ['group' => $group]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <div class="h3 card-title">@lang('system.permissions')</div>
            </div>
            <div class="card-body">
                <x-forms.radio name="is_restricted" id="permissionsPermissionsUnrestricred" :label="__('system.permissions_unrestricred')" value="N" :is-checked="$group->is_restricted == 'N' ? true : false" />
                <x-forms.radio name="is_restricted" id="radioPermissionsRestricted" :label="__('system.permissions_restricted')" value="Y" :is-checked="$group->is_restricted == 'Y' ? true : false" class="mb-0" />
            </div>
        </div>

        <div id="setPermissions" class="{{ $group->is_restricted == 'N' ? 'd-none' : '' }}">
            <div class="card">
                <div class="card-body">
                    @foreach ($permissions as $group)
                        <div class="row">
                            @foreach ($group['children'] as $subgroup)
                                <div class="col-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                                    <div class="card w-100">
                                        <div class="card-header bg-light">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="grantSubgroup{{ $subgroup['key'] }}" data-type="subgroup" data-key="{{ $subgroup['key'] }}" data-group="{{ $group['key'] }}" {{ $is_restricted == 'N' || $subgroups_checked[$subgroup['key']] ? 'checked' : '' }}>
                                                <label for="grantSubgroup{{ $subgroup['key'] }}" class="custom-control-label">{{ $subgroup['name'] }}</label>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($subgroup['children'] as $permission)
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="permissions[]" value="{{ $permission['key'] }}" id="grantPermission{{ $permission['key'] }}" data-type="permission" data-key="{{ $permission['key'] }}" data-group="{{ $group['key'] }}" data-subgroup="{{ $subgroup['key'] }}" {{ $is_restricted == 'N' || in_array($permission['key'], $group_permissions) ? 'checked' : '' }}>
                                                    <label for="grantPermission{{ $permission['key'] }}" class="custom-control-label">{{ $permission['name'] }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    
        <x-card>
            <button class="btn btn-primary" type="submit">@lang('system.save')</button>
        </x-card>
    </form>

    @push('scripts')
        <script src="{{ asset('assets/js/admin/permissions.js') }}" defer></script>
    @endpush
</x-admin-layout>