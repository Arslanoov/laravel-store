@foreach ($variants as $variant)
    <option value="{{ $variant->id }}" {{ $variant->id == old('variant', $variant->id) ? ' selected' : '' }}>
        {{ $variant->name }}
    </option>
@endforeach