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

                    @include ('cabinet._nav', ['page' => 'orders'])

                    <h3>My Orders</h3>
                    @foreach ($user->orders as $order)
                        <h4>
                            <a href="{{ route('cabinet.orders.show', $order) }}" style="color:black">
                                <span style="@if ($order->isCancelled()) color:red @endif">Order №{{ $order->id }} ({{ date('d-M h:i', strtotime($order->created_at)) }})</span>
                            </a>
                        </h4>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection