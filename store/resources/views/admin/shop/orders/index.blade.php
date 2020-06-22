@extends('layouts.admin')

@section('content')
    @include('admin.shop.orders._nav')

    <div class="card mb-3">
        <div class="card-header">Shop Orders</div>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Created At</th>
            <th>User Name</th>
            <th>User Surname</th>
            <th>User Patronymic</th>
            <th>User E-mail</th>
            <th>User Phone</th>
            <th>Region</th>
            <th>Code</th>
            <th>Delivery Method</th>
            <th>Cost</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at }}</td>
                <td><a href="{{ route('admin.users.show', $order->user) }}">{{ $order->customerData->name }}</a></td>
                <td>{{ $order->customerData->surname }}</td>
                <td>{{ $order->customerData->patronymic }}</td>
                <td>{{ $order->customerData->email }}</td>
                <td>{{ $order->customerData->phone }}</td>
                <td><a href="{{ route('admin.regions.show', $order->deliveryData->region) }}">{{ $order->deliveryData->region->name }}</a></td>
                <td>{{ $order->deliveryData->code }}</td>
                <td><a href="{{ route('admin.shop.deliveryMethods.show', $order->deliveryMethod) }}">{{ $order->delivery_method_name }}</a></td>
                <td>{{ $order->cost }}</td>
                <td>
                    @if ($order->isNew())
                        <span class="badge badge-danger">New</span>
                    @endif

                    @if ($order->isPaid())
                        <span class="badge badge-primary">Paid</span>
                    @endif

                    @if ($order->isSent())
                        <span class="badge badge-primary">Sent</span>
                    @endif

                    @if ($order->isCompleted())
                        <span class="badge badge-success">Completed</span>
                    @endif

                    @if ($order->isCancelledByCustomer())
                        <span class="badge badge-danger">Cancelled by customer</span>
                    @endif

                    @if ($order->isCancelledByAdmin())
                        <span class="badge badge-danger">Cancelled by Admin</span>
                    @endif
                </td>
                <td><a href="{{ route('admin.shop.orders.show', $order) }}">Show More</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $orders->links() }}

@endsection