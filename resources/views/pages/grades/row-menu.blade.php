<div class="dropdown">
    <button class="btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $grade->id }}" data-toggle="dropdown" aria-expanded="false">
        @lang('system.menu')
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $grade->id }}">
        <a href="{{ route('grades.edit', ['grade' => $grade]) }}" class="dropdown-item">@lang('system.edit')</a>
        <button class="btn btn-link dropdown-item" type="button" data-toggle="modal" data-target="#modalDelete" data-delete="{{ route('grades.destroy', ['grade' => $grade]) }}">@lang('system.delete')</button>
    </div>
</div>