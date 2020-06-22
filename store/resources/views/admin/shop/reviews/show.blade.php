@extends('layouts.admin')

@section('content')
    @include('admin.shop.reviews._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.reviews.edit', $review) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.shop.reviews.destroy', $review) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $review->id }}</td>
        </tr>
        <tr>
            <th>Author</th><td>{{ $review->author_id ? $review->author->name : 'Empty' }}</td>
        </tr>
        <tr>
            <th>Product</th><td>{{ $review->product->title }}</td>
        </tr>
        <tr>
            <th>Rating</th><td>{{ $review->rating }}</td>
        </tr>
        <tr>
            <th>Text</th><td>{{ $review->text }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection