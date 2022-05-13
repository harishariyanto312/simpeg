<div class="form-group">
    <label for="field_{{ $name }}">{{ $label }}</label>
    <input type="password" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="field_{{ $name }}" value="{{ $value ?? '' }}">
    @error($name)
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>