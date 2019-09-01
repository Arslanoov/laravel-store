@extends('layouts.app')

@section('content')
    @include('admin.shop.brands._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.brands.edit', $brand) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.shop.brands.destroy', $brand) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $brand->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $brand->name }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $brand->slug }}</td>
        </tr>
        <tr>
            <th>Description</th><td>{{ $brand->description }}</td>
        </tr>
        </tbody>
    </table>
@endsection