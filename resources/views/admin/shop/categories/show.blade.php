@extends('layouts.admin')

@section('content')
    @include('admin.shop.categories._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.categories.edit', $category) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.shop.categories.destroy', $category) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $category->id }}</td>
        </tr>
        <tr>
            <th>Parent</th><td>
                @if(isset($category->parent))
                    <a href="{{ route('admin.shop.categories.show', $parentCategory) }}">{{ $category->parent->name }}</a>
                @else
                    Empty
                @endif
            </td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $category->name }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $category->slug }}</td>
        </tr>
        <tr>
            <th>Title</th><td>{{ $category->title }}</td>
        </tr>
        <tr>
            <th>Description</th><td>{{ $category->description }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection