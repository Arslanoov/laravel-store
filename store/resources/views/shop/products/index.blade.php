@extends ('layouts.app')

@section ('content')

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Products</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('shop.products.index') }}">Shop</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">

        @include ('shop.products._sidebar')

        @include ('shop.products._list')

    </div>
</div>

@include ('shop.products._deals')

@endsection