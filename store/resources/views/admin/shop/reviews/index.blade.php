@extends('layouts.admin')

@section('content')
    @include('admin.shop.reviews._nav')

    <div class="card mb-3">
        <div class="card-header">Shop Reviews</div>
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="text" class="col-form-label">Text</label>
                            <input id="text" class="form-control" name="text" value="{{ request('text') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Product</th>
            <th>Rating</th>
            <th>Text</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->author_id ? $review->author->name : 'Empty' }}</td>
                <td>{{ $review->product_id ? $review->product->title : 'Empty' }}</td>
                <td>{{ $review->rating }}</td>
                <td><a href="{{ route('admin.shop.reviews.show', $review) }}">{{ Str::limit($review->text, 50) }}</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $reviews->links() }}

@endsection