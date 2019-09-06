@foreach ($brands as $brand)
    <option value="{{ $brand->id }}" {{ $brand->id == old('brand', $brand->id) ? ' selected' : '' }}>
        {{ $brand->name }}
    </option>
@endforeach