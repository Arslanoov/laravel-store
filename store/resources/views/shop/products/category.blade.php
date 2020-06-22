@extends ('layouts.app')

@section ('content')

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Products</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('shop.products.index') }}">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('shop.products.category', compact('category')) }}">{{ $category->name }}</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">

        @include ('shop.products._sidebar')

        <div class="col-xl-9 col-lg-8 col-md-7">
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting">
                    <select class="select">
                        <option value="1">Default sorting</option>
                        <option value="1">Default sorting</option>
                        <option value="1">Default sorting</option>
                    </select>
                </div>
                <div class="sorting mr-auto">
                    <select class="select">
                        <option value="10">Show 10</option>
                        <option value="20">Show 20</option>
                        <option value="30">Show 30</option>
                    </select>
                </div>
                {{--<div class="pagination">
                    {{ $products->links() }}
                </div>--}}
            </div>

            <section class="lattest-product-area pb-40 category-list">
                <div class="row">

                    @foreach ($category->products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="{{ $product->photos()->first()->getUrl() }}" alt="">
                                <div class="product-details">
                                    <h6>{{ $product->title }}</h6>
                                    <div class="price">
                                        <h6>${{ $product->price }}</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href="" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">compare</p>
                                        </a>
                                        <a href="{{ route('shop.products.single', ['id' => $product->id, 'slug' => $product->slug]) }}" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

    </div>
</div>

@include ('shop.products._deals')

@endsection