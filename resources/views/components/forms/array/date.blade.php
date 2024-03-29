<div class="form-group">
    @if (!empty($label))
        <label for="field_{{ $name }}">{{ $label }} @if (isset($isRequired) && $isRequired) <span class="text-danger">*</span> @endif</label>
    @endif
    <input type="text" name="{{ $name }}" class="form-control @error(str_replace(['[', ']'], ['.', ''], $name)) is-invalid @enderror" value="{{ $value ?? '' }}" id="field_{{ $name }}" data-is-date="1" @isset($defaultDate) data-default="{{ $defaultDate }}" @endif {{ $attributes }}>
    @error(str_replace(['[', ']'], ['.', ''], $name))
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>