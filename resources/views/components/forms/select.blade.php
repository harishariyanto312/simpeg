<div class="form-group">
    @if (!empty($label))
        <label for="select_{{ $name }}">{{ $label }} @if (isset($isRequired) && $isRequired) <span class="text-danger">*</span> @endif</label>
    @endif
    <select name="{{ $name }}" id="select_{{ $name }}" class="form-control @error($name) is-invalid @enderror" {{ $attributes->whereStartsWith('data-') }} {{ $attributes->get('disabled') }}>
        @foreach ($options as $key => $val)
            <option value="{{ $key }}" {{ $value == $key ? 'selected' : '' }}>{{ $val }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>