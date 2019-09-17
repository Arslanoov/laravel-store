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
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </div>

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
                                <a href="javascript:void(0)" class="social-info add-to-cart" data-product-id="{{ $product->id }}">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">Add to bag</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Wishlist</p>
                                </a>
                                <a href="" class="social-info">
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
    </section>
</div>

@section ('script')
    <script>
        $(document).on("click", ".add-to-cart", function () {
            let productId = $(this).data("product-id");
            let quantity = 1;

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
                    cartItemsCount.text(+ count + quantity);
                },
                "error": function (e) {
                    console.log(e);
                }
            });
        });
    </script>
@endsection