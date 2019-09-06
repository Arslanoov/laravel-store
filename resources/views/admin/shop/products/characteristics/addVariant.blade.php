@extends('layouts.app')

@section('content')
    @include('admin.shop.products._nav')

    <form method="POST" action="{{ route('admin.shop.products.characteristics.storeVariant', compact('product', 'characteristic')) }}">
        @csrf

        <div class="form-group">
            <label for="variant" class="col-form-label">Variant</label>

            <select id="variant" class="form-control{{ $errors->has('variant') ? ' is-invalid' : '' }}" name="variant">
                @include('admin.shop.products.characteristics.variant', ['variants' => $variants])
            </select>

            @if ($errors->has('variant'))
                <span class="invalid-feedback"><strong>{{ $errors->first('variant') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection