@extends('layouts.app')

@section('content')
    @include('admin.pages._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $page->id }}</td>
        </tr>
        <tr>
            <th>Parent</th><td><a href="{{ $parentPage ? route('admin.pages.show', $parentPage) : '#' }}">{{ $page->parent->title ?? 'Null' }}</a></td>
        </tr>
        <tr>
            <th>Title</th><td>{{ $page->title }}</td>
        </tr>
        <tr>
            <th>Menu Title</th><td>{{ $page->menu_title }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $page->slug }}</td>
        </tr>
        <tr>
            <th>Description</th><td>{{ $page->description }}</td>
        </tr>
        <tr>
            <th>Content</th><td>{{ $page->content }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection