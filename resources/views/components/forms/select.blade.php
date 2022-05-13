<div class="form-group">
    @if (!empty($label))
        <label for="select_{{ $name }}">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="select_{{ $name }}" class="form-control @error($name) is-invalid @enderror">
        @foreach ($options as $key => $val)
            <option value="{{ $key }}" {{ $value == $key ? 'selected' : '' }}>{{ $val }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>