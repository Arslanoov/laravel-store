@foreach ($characteristics as $characteristic)
    <option value="{{ $characteristic->id }}" {{ $characteristic->id == old('characteristic', $characteristic->id) ? ' selected' : '' }}>
        {{ $characteristic->name }}
    </option>
@endforeach