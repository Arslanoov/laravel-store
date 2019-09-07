@extends('layouts.app')

@section('content')
    @include('admin.shop.comments._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.comments.edit', $comment) }}" class="btn btn-primary mr-1">Edit</a>

        @if($comment->isActive())
            <form method="POST" action="{{ route('admin.shop.comments.destroy', $comment) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        @endif

        @if($comment->isDraft())
            <form method="POST" action="{{ route('admin.shop.comments.activate', $comment) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">Activate</button>
            </form>
        @endif
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $comment->id }}</td>
        </tr>
        <tr>
            <th>Parent</th><td>
                {{ $comment->parent_id ?? 'Empty' }}
            </td>
        </tr>
        <tr>
            <th>Author</th><td>{{ $comment->author->name }}</td>
        </tr>
        <tr>
            <th>Post</th><td>{{ $comment->post->title }}</td>
        </tr>
        <tr>
            <th>Text</th><td>{{ $comment->text }}</td>
        </tr>
        <tr>
            <th>Active</th>
            <td>
                @if ($comment->isDraft())
                    <span class="badge badge-secondary">Draft</span>
                @endif
                @if ($comment->isActive())
                    <span class="badge badge-primary">Active</span>
                @endif
            </td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection