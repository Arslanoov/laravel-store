@extends('layouts.app')

@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Cabinet</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include ('cabinet._nav', ['page' => 'order-view'])

                    <h3>Order №{{ $order->id }}</h3>
                    <h4>Created At {{ $order->created_at }}</h4>
                    <h4>Cost: {{ $order->cost }}</h4>
                    <h4>Note: {{ $order->note }}</h4>
                    <h4>Status: {{ $order->current_status }}</h4>
                    <h4>Statuses History:</h4>
                    @foreach ($order->statuses as $status)
                        <p>{{ $status->created_at }} - {{ $status->value }}</p>
                    @endforeach
                    <h4>Delivery method: {{ $order->delivery_method_name }} - ${{ $order->delivery_method_cost }}</h4>
                    <h4>Payment Method: {{ $order->payment_method }}</h4>

                    <h4>Products:</h4>
                    @foreach ($order->items as $orderItem)
                        <img src="{{ $orderItem->product->photos()->exists() ? $orderItem->product->photos()->first()->getUrl() : '' }}" alt="" width="200px">
                        <p>{{ $orderItem->product_name }}</p>
                        <p>{{ $orderItem->product_price }}</p>
                        <p>{{ $orderItem->product_quantity }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection