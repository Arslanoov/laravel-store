@extends('layouts.app')

@section('content')
    @include('admin.shop.comments._nav')

    <form method="POST" action="{{ route('admin.shop.comments.update', $comment) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="parentId" class="col-form-label">Parent Id</label>
            <input id="parentId" class="form-control{{ $errors->has('parentId') ? ' is-invalid' : '' }}" name="parentId" value="{{ $comment->parent_id }}">
            @if ($errors->has('parentId'))
                <span class="invalid-feedback"><strong>{{ $errors->first('parentId') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="text" class="col-form-label">Text</label>
            <textarea id="text" class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" rows="10">{{ $comment->text }}</textarea>
            @if ($errors->has('text'))
                <span class="invalid-feedback"><strong>{{ $errors->first('text') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection