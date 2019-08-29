@extends('layouts.app')

@section('content')
    @include('admin.blog.posts._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.blog.posts.edit', $post) }}" class="btn btn-primary mr-1">Edit</a>

        @if ($post->isDraft())
            <form method="POST" action="{{ route('admin.blog.posts.verify', $post) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">Verify</button>
            </form>
        @endif

        @if ($post->isActive())
            <form method="POST" action="{{ route('admin.blog.posts.draft', $post) }}" class="mr-1">
                @csrf
                <button class="btn btn-danger">Draft</button>
            </form>
        @endif

        @if ($post->photo)
            <form method="POST" action="{{ route('admin.blog.posts.photo', $post) }}" class="mr-1">
                @csrf
                <button class="btn btn-danger">Delete Photo</button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.blog.posts.destroy', $post) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $post->id }}</td>
        </tr>
        <tr>
            <th>Author</th><td>{{ $post->author->name }}</td>
        </tr>
        <tr>
            <th>Category</th><td>{{ $post->category->name ?? 'null' }}</td>
        </tr>
        <tr>
            <th>Title</th><td>{{ $post->title }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $post->slug }}</td>
        </tr>
        <tr>
            <th>Description</th><td>{{ $post->description }}</td>
        </tr>
        <tr>
            <th>Photo</th><td><img src="{{ $post->getImageUrl() }}" width="90%" alt="" class="img img-responsive"></td>
        </tr>
        <tr>
            <th>Content</th><td>{{ $post->content }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if ($post->isDraft())
                    <span class="badge badge-secondary">Draft</span>
                @endif
                @if ($post->isActive())
                    <span class="badge badge-primary">Active</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Views</th><td>{{ $post->views }}</td>
        </tr>
        <tr>
            <th>Comments</th><td>{{ $post->comments }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection