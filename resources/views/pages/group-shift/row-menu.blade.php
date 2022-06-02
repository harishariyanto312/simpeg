<div class="dropdown">
    <button class="btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $group_shift_item->id }}" data-toggle="dropdown" aria-expanded="false">
        @lang('system.menu')
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $group_shift_item->id }}">
        <a href="{{ route('group-shift.edit', ['group_shift' => $group_shift_item]) }}" class="dropdown-item">@lang('system.edit')</a>
        <button class="btn btn-link dropdown-item" type="button" data-toggle="modal" data-target="#modalDelete" data-delete="{{ route('group-shift.destroy', ['group_shift' => $group_shift_item]) }}">@lang('system.delete')</button>
    </div>
</div>