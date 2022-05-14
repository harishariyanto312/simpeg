<div class="form-group {{ $attributes->has('class') ? $attributes->get('class') : '' }}">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" name="{{ $name }}" id="{{ $id ?? 'radio_' . $name }}" value="{{ $value ?? '' }}" {{ $isChecked ? 'checked' : '' }}>
        <label for="{{ $id ?? 'radio_' . $name }}" class="custom-control-label font-weight-normal">{{ $label }}</label>
    </div>
</div>