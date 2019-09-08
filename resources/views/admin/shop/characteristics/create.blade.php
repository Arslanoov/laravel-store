@extends('layouts.admin')

@section('content')
    @include('admin.shop.characteristics._nav')

    <form method="POST" action="{{ route('admin.shop.characteristics.store') }}">
        @csrf

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="type" class="col-form-label">Type</label>
            <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="type" id="type">
                @foreach ($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
            @if ($errors->has('type'))
                <span class="invalid-feedback"><strong>{{ $errors->first('type') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="required" class="col-form-label">Required</label>
            <select name="required" id="required" class="form-control{{ $errors->has('required') ? ' is-invalid' : '' }}">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @if ($errors->has('required'))
                <span class="invalid-feedback"><strong>{{ $errors->first('required') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="default" class="col-form-label">Default</label>
            <input id="default" class="form-control{{ $errors->has('default') ? ' is-invalid' : '' }}" name="default" value="{{ old('default') }}" required>
            @if ($errors->has('default'))
                <span class="invalid-feedback"><strong>{{ $errors->first('default') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="sort" class="col-form-label">Sort</label>
            <input id="sort" class="form-control{{ $errors->has('sort') ? ' is-invalid' : '' }}" name="sort" value="{{ old('sort') }}" required>
            @if ($errors->has('sort'))
                <span class="invalid-feedback"><strong>{{ $errors->first('sort') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection