<div class="form-group">
    @if (!empty($label))
        <label for="field_{{ $name }}">{{ $label }} @if (isset($isRequired) && $isRequired) <span class="text-danger">*</span> @endif</label>
    @endif
    <input type="text" class="form-control @error(str_replace(['[', ']'], ['.', ''], $name)) is-invalid @enderror" name="{{ $name }}" id="field_{{ $name }}" value="{{ $value ?? '' }}" {{ $attributes }}>
    @error(str_replace(['[', ']'], ['.', ''], $name))
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>