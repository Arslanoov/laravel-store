@extends('layouts.admin')

@section('content')
    @include('admin.shop.deliveryMethods._nav')

    <form method="POST" action="{{ route('admin.shop.deliveryMethods.update', $deliveryMethod) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $deliveryMethod->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="cost" class="col-form-label">Cost</label>
            <input id="cost" class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" name="cost" value="{{ old('cost', $deliveryMethod->cost) }}" required>
            @if ($errors->has('cost'))
                <span class="invalid-feedback"><strong>{{ $errors->first('cost') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="min_weight" class="col-form-label">Min Weight</label>
            <input id="min_weight" class="form-control{{ $errors->has('min_weight') ? ' is-invalid' : '' }}" name="min_weight" value="{{ old('min_weight', $deliveryMethod->min_weight) }}" required>
            @if ($errors->has('min_weight'))
                <span class="invalid-feedback"><strong>{{ $errors->first('min_weight') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="max_weight" class="col-form-label">Max Weight</label>
            <input id="max_weight" class="form-control{{ $errors->has('max_weight') ? ' is-invalid' : '' }}" name="max_weight" value="{{ old('max_weight', $deliveryMethod->max_weight) }}" required>
            @if ($errors->has('max_weight'))
                <span class="invalid-feedback"><strong>{{ $errors->first('max_weight') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="sort" class="col-form-label">Sort</label>
            <input id="sort" class="form-control{{ $errors->has('sort') ? ' is-invalid' : '' }}" name="sort" value="{{ old('sort', $deliveryMethod->sort) }}" required>
            @if ($errors->has('sort'))
                <span class="invalid-feedback"><strong>{{ $errors->first('sort') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection