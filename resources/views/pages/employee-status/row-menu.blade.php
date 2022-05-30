<div class="dropdown">
    <button class="btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $employee_status_item->id }}" data-toggle="dropdown" aria-expanded="false">
        @lang('system.menu')
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $employee_status_item->id }}">
        <a href="{{ route('employee-status.edit', ['employee_status' => $employee_status_item]) }}" class="dropdown-item">@lang('system.edit')</a>
        <button class="btn btn-link dropdown-item" type="button" data-toggle="modal" data-target="#modalDelete" data-delete="{{ route('employee-status.destroy', ['employee_status' => $employee_status_item]) }}">@lang('system.delete')</button>
    </div>
</div>