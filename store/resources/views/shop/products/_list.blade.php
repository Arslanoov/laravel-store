<div class="col-xl-9 col-lg-8 col-md-7">
    <section class="lattest-product-area pb-40 category-list">
        <div class="row">

            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ $product->photos()->exists() ? $product->photos()->first()->getUrl() : '' }}" alt="">
                        <div class="product-details">
                            <h6>{{ $product->title }}</h6>
                            <div class="price">
                                <h6>${{ $product->price }}</h6>
                            </div>
                            <div class="prd-bottom">
                                <a href="#" class="social-info add-to-wishlist" data-id="{{ $product->id }}">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Wishlist</p>
                                </a>
                                <a href="#" class="social-info add-to-comparison" data-id="{{ $product->id }}">
                                    <span class="lnr lnr-sync"></span>
                                    <p class="hover-text">Compare</p>
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
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </section>
</div>

@section ('script')
    <script>
        $(document).on("click", ".add-to-cart", function () {
            let productId = $(this).data("product-id");
            let quantity = 1;

            $.ajax({
                "headers": {
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
                    cartItemsCount.text(+ count + quantity);
                }
            });
        });
    </script>

    <script>
        $(document).on("click", ".add-to-wishlist", function () {
            let productId = $(this).data("id");

            $.ajax({
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": "/cabinet/wishlist/item/create",
                "method": "POST",
                'data': {
                    productId: productId
                },
                "success": function (data) {
                    alert("Item successfully added to wishlist");
                }
            });

            return false;
        });
    </script>

    <script>
        $(document).on("click", ".add-to-comparison", function () {
            let productId = $(this).data("id");

            $.ajax({
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": "/cabinet/comparison/item/add",
                "method": "POST",
                'data': {
                    productId: productId
                },
                "success": function (data) {
                    alert("Item successfully added to comparison");
                }
            });

            return false;
        });
    </script>
@endsection