<div class="form-group">
    @if (!empty($label))
        <label for="field_{{ $name }}">{{ $label }}</label>
    @endif
    <input type="text" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="field_{{ $name }}" value="{{ $value ?? '' }}" {{ $attributes }}>
    @error($name)
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>