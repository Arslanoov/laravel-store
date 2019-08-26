@extends('layouts.app')

@section('content')
    @include('admin.blog.tags._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.blog.tags.edit', $tag) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.blog.tags.destroy', $tag) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $tag->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $tag->name }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $tag->slug }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection