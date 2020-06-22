@extends('layouts.admin')

@section('content')
    @include('admin.shop.reviews._nav')

    <form method="POST" action="{{ route('admin.shop.reviews.update', $review) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="rating" class="col-form-label">Rating</label>
            <textarea id="rating" class="form-control {{ $errors->has('rating') ? ' is-invalid' : '' }}" name="rating" rows="10">{{ $review->rating }}</textarea>
            @if ($errors->has('rating'))
                <span class="invalid-feedback"><strong>{{ $errors->first('rating') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="text" class="col-form-label">Text</label>
            <textarea id="text" class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" rows="10">{{ $review->text }}</textarea>
            @if ($errors->has('text'))
                <span class="invalid-feedback"><strong>{{ $errors->first('text') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection