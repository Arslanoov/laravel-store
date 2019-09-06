@extends('layouts.app')

@section('content')
    @include('admin.shop.products._nav')

    <form method="POST" action="{{ route('admin.shop.products.characteristics.store', $product) }}">
        @csrf

        <div class="form-group">
            <label for="characteristic" class="col-form-label">Characteristic</label>

            <select id="characteristic" class="form-control{{ $errors->has('characteristic') ? ' is-invalid' : '' }}" name="characteristic">
                @include('admin.shop.products.characteristics.characteristic', ['characteristics' => $characteristics])
            </select>

            @if ($errors->has('characteristic'))
                <span class="invalid-feedback"><strong>{{ $errors->first('characteristic') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection