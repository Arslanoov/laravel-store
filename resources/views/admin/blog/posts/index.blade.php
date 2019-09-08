@extends('layouts.admin')

@section('content')
    @include('admin.blog.posts._nav')

    <p><a href="{{ route('admin.blog.posts.create') }}" class="btn btn-success">Add Post</a></p>

    <div class="card mb-3">
        <div class="card-header">Blog Posts</div>
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
                            <label for="title" class="col-form-label">Title</label>
                            <input id="title" class="form-control" name="title" value="{{ request('slug') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="slug" class="col-form-label">Slug</label>
                            <input id="slug" class="form-control" name="slug" value="{{ request('slug') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status</label>
                            <select id="status" class="form-control" name="status">
                                <option value=""></option>
                                @foreach ($statuses as $value => $label)
                                    <option value="{{ $value }}"{{ $value === request('status') ? ' selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
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
            <th>Category</th>
            <th>Photo</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Views</th>
            <th>Comments</th>
            <th>Likes</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->author->name ?? 'Null' }}</td>
                <td>{{ $post->category->name ?? 'Null' }}</td>
                <td><img src="{{ $post->getImageUrl() }}" class="img img-responsive" width="100px" alt=""></td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td><a href="{{ route('admin.blog.posts.show', $post) }}">{{ $post->title }}</a></td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->views }}</td>
                <td>{{ $post->comments }}</td>
                <td>{{ $post->likes }}</td>
                <td>
                    @if ($post->isDraft())
                        <span class="badge badge-secondary">Draft</span>
                    @endif
                    @if ($post->isActive())
                        <span class="badge badge-primary">Active</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $posts->links() }}

@endsection