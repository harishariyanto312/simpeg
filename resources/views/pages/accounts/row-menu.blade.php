<div class="dropdown">
    <button class="btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $account->id }}" data-toggle="dropdown" aria-expanded="false">
        @lang('system.menu')
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $account->id }}">
        <a href="{{ route('accounts.edit', ['account' => $account]) }}" class="dropdown-item">@lang('system.edit')</a>
        <button class="btn btn-link dropdown-item" type="button" data-toggle="modal" data-target="#modalDelete" data-delete="{{ route('accounts.destroy', ['account' => $account]) }}">@lang('system.delete')</button>
    </div>
</div>