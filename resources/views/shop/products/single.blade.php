@extends ('layouts.app')

@section ('meta')
    <meta name="title" content="{{ $product->title }}">
    <meta name="description" content="{{ $product->description }}">
@endsection

@section ('content')

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Product Details Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('shop.products.index') }}">Shop</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    @foreach ($product->photos as $photo)
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{ $photo->getUrl() }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->title }}</h3>
                    <h2>${{ $product->price }}</h2>
                    <ul class="list">
                        <li><a class="active" href="{{ $product->category ? route('shop.products.category', ['slug' => $product->category->slug]) : "javascript:void(0)" }}"><span>Category</span> : {{ $product->category ? $product->category->name : 'None' }}</a></li>
                        <li>
                            <a href="javascript:void(0)">
                                <span>Availability</span> :
                                @if ($product->isAvailable())
                                    In Stock
                                @endif

                                @if ($product->isUnavailable())
                                    Out Of Stock
                                @endif
                            </a>
                        </li>
                        <li><a href="javascript:void(0)"><span>Weight</span> : {{ $product->weight }}</a></li>
                    </ul>
                    <p>
                        {{ $product->description }}
                    </p>
                    @if ($product->isAvailable())
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                        </div>
                    @else
                        <p>This product is currently out of stock and unavailable.</p>
                    @endif

                    <div class="card_area d-flex align-items-center">
                        @if ($product->isAvailable())
                            <a class="primary-btn add-to-cart" href="javascript:void(0)" data-product-id="{{ $product->id }}">Add to Cart</a>
                        @endif
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                   aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                   aria-selected="false">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                   aria-selected="false">Reviews</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                    {!! $product->content !!}
                </p>
            </div>

            @include ('shop.products.single._characteristics', compact('product'))

            @include ('shop.products.single._comments', compact('product'))

            @include ('shop.products.single._reviews', compact('product'))

        </div>
    </div>
</section>

@include ('shop.products._deals')

@endsection

@section ('script')
    <script>
        $(document).on("click", "#comments .reply_btn", function () {
            let link = $(this);
            let comment = link.closest(".review_item");
            $("#parent").val(comment.data("id"));
            $("#parent_comment").html(comment.data("title"));
            return false;
        });

        $(document).on("click", ".star", function () {
            let rating = $(this).data('rating');
            let input = $("#rating");

            for (let i = 5; i > rating; i--) {
                let currentStar = $("#star_" + i);
                currentStar.removeClass("fa-star");
                currentStar.addClass("fa-star-o");
            }

            for (let j = 1; j <= rating; j++) {
                let currentStar = $("#star_" + j);
                currentStar.removeClass("fa-star-o");
                currentStar.addClass("fa-star");
            }

            input.val(rating);

            return false;
        });

        $(document).on("click", ".add-to-cart", function () {
            let productId = $(this).data("product-id");
            let quantity = $("#qty").val();

            $.ajax({
                'headers': {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": "/shop/cart/add",
                "method": "POST",
                "data": {
                    productId: productId,
                    quantity: quantity
                },
                "success": function () {
                    let cartItemsCount = $("#cart-items-count");
                    let count = cartItemsCount.text();
                    cartItemsCount.text(parseInt(count) + parseInt(quantity));
                }
            });
        });
    </script>
@endsection