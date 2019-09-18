@extends('layouts.admin')

@section('content')
    @include('admin.shop.deliveryMethods._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.deliveryMethods.edit', $deliveryMethod) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.shop.deliveryMethods.destroy', $deliveryMethod) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $deliveryMethod->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $deliveryMethod->name }}</td>
        </tr>
        <tr>
            <th>Cost</th><td>{{ $deliveryMethod->cost }}</td>
        </tr>
        <tr>
            <th>Min Weight</th><td>{{ $deliveryMethod->min_weight }}</td>
        </tr>
        <tr>
            <th>Max Weight</th><td>{{ $deliveryMethod->max_weight }}</td>
        </tr>
        <tr>
            <th>Sort</th><td>{{ $deliveryMethod->sort }}</td>
        </tr>
        </tbody>
    </table>
@endsection