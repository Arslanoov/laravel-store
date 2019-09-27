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
                        <p>{{ $order->id }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection