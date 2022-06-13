<div class="dropdown">
    <button class="btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $bank->id }}" data-toggle="dropdown" aria-expanded="false">
        @lang('system.menu')
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $bank->id }}">
        <a href="{{ route('banks.edit', ['bank' => $bank]) }}" class="dropdown-item">@lang('system.edit')</a>
        <button class="btn btn-link dropdown-item" type="button" data-toggle="modal" data-target="#modalDelete" data-delete="{{ route('banks.destroy', ['bank' => $bank]) }}">@lang('system.delete')</button>
    </div>
</div>