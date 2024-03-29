<div class="form-group">
    @if (!empty($label))
        <label for="select_{{ $name }}">{{ $label }} @if (isset($isRequired) && $isRequired) <span class="text-danger">*</span> @endif</label>
    @endif
    <select name="{{ $name }}" id="select_{{ $name }}" class="form-control @error(str_replace(['[', ']'], ['.', ''], $name)) is-invalid @enderror">
        @foreach ($options as $key => $val)
            <option value="{{ $key }}" {{ $value == $key ? 'selected' : '' }}>{{ $val }}</option>
        @endforeach
    </select>
    @error(str_replace(['[', ']'], ['.', ''], $name))
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>