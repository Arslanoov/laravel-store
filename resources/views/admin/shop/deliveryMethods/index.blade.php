@extends('layouts.admin')

@section('content')
    @include('admin.shop.deliveryMethods._nav')

    <p><a href="{{ route('admin.shop.deliveryMethods.create') }}" class="btn btn-success">Add Delivery Method</a></p>

    <div class="card mb-3">
        <div class="card-header">Shop Delivery Methods</div>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Cost</th>
            <th>Min Weight</th>
            <th>Max Weight</th>
            <th>Sort</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($deliveryMethods as $deliveryMethod)
            <tr>
                <td>{{ $deliveryMethod->id }}</td>
                <td><a href="{{ route('admin.shop.deliveryMethods.show', $deliveryMethod) }}">{{ $deliveryMethod->name }}</a></td>
                <td>{{ $deliveryMethod->cost }}</td>
                <td>{{ $deliveryMethod->min_weight }}</td>
                <td>{{ $deliveryMethod->max_weight }}</td>
                <td>{{ $deliveryMethod->sort }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $deliveryMethods->links() }}

@endsection