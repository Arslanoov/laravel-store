@extends('layouts.admin')

@section('content')
    @include('admin.blog.comments._nav')

    <div class="card mb-3">
        <div class="card-header">Blog Comments</div>
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
                            <label for="parentId" class="col-form-label">Parent Id</label>
                            <input id="parentId" class="form-control" name="parentId" value="{{ request('parentId') }}">
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
            <th>Parent</th>
            <th>Author</th>
            <th>Post</th>
            <th>Text</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->parent_id ?? 'Empty' }}</td>
                <td>{{ $comment->author->name }}</td>
                <td>{{ $comment->post->title }}</td>
                <td><a href="{{ route('admin.blog.comments.show', $comment) }}">{{ Str::limit($comment->text, 50) }}</a></td>
                <td>
                    @if ($comment->isDraft())
                        <span class="badge badge-secondary">Draft</span>
                    @endif
                    @if ($comment->isActive())
                        <span class="badge badge-primary">Active</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $comments->links() }}

@endsection