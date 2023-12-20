<!-- Order your soul. Reduce your wants. - Augustine -->
@if ($type == 'textarea')
    <textarea class="form-control" name="{{ $name }}" id="input{{ $name }}" cols="20" rows="10"
        placeholder="{{ $placeholder }}" required>{{ old('content') }}</textarea>
    <label class="form-label" for="input{{ $name }}">{{ $label }}</label>
@elseif($type == 'checkbox')
    <input class="form-check-input" name="{{ $name }}" type="hidden" value="0" />
    <input class="form-check-input" name="{{ $name }}" type="checkbox" value="1"
        id="input{{ $name }}" checked />
    <label class="form-check-label" for="input{{ $name }}">{{ $label }}</label>
@else
    <input type="{{ $type }}" id="input{{ $name }}" name="{{ $name }}" class="form-control"
        value="{{ old($name) }}" placeholder="{{ $placeholder }}" required />
    <label class="form-label" for="input{{ $name }}">{{ $label }}</label>
@endif

