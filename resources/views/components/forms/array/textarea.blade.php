<div class="form-group">
    <label for="field_{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" id="field_{{ $name }}" rows="{{ $rows ?? 3 }}" class="form-control @error(str_replace(['[', ']'], ['.', ''], $name)) is-invalid @enderror" {{ $attributes }}>{{ $value ?? '' }}</textarea>
    @error(str_replace(['[', ']'], ['.', ''], $name))
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>