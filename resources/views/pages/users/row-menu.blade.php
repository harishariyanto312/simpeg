<div class="dropdown">
    <button class="btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $user->id }}" data-toggle="dropdown" aria-expanded="false">
        @lang('system.menu')
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $user->id }}">
        @can('permission', 'system_users_edit')
            <a href="{{ route('users.edit', ['user' => $user]) }}" class="dropdown-item">@lang('system.edit')</a>
        @endcan
        @can('permission', 'system_users_delete')
            <button class="btn btn-link dropdown-item" type="button" data-toggle="modal" data-target="#modalDelete" data-delete="{{ route('users.destroy', ['user' => $user]) }}">@lang('system.delete')</button>
        @endcan
    </div>
</div>