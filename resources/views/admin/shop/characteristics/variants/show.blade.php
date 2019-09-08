@extends('layouts.admin')

@section('content')
    @include('admin.shop.characteristics.variants._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.characteristics.variants.edit', compact('characteristic', 'variant')) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.shop.characteristics.variants.destroy', compact('characteristic', 'variant')) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $variant->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $variant->name }}</td>
        </tr>
        </tbody>
    </table>
@endsection