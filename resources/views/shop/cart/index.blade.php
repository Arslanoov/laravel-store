@extends ('layouts.app')

@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('shop.cart.index') }}">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Total Weight</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($cartItems as $cartItem)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{ $cartItem->product->getImageUrl($cartItem->product->photos()->exists() ? $cartItem->product->photos()->first()->photo : '') }}" alt="" width="60px" height="60px">
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $cartItem->product->title }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{ $cartItem->product->price }}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="qty">{{ $cartItem->quantity }}</span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$<span class="price">{{ $cartItem->total_price }}</span></h5>
                                </td>
                                <td>
                                    <h5><span class="weight">{{ $cartItem->total_weight }}</span></h5>
                                </td>
                                <td>
                                    <form id="form" action="{{ route('shop.cart.destroy', compact('cartItem')) }}" method="POST">
                                        @csrf
                                        <i class="lnr lnr-trash" onclick="document.getElementById('form').submit()"></i>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td>
                                <form action="{{ route('shop.cart.destroyAll') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Remove All</button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal price</h5>
                            </td>
                            <td>
                                <h5>$<span id="total_price">0</span></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal weight</h5>
                            </td>
                            <td>
                                <h5><span id="total_weight">{{ $totalWeight }}</span> g</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="{{ route('shop.products.index') }}">Continue Shopping</a>
                                    <a class="primary-btn" href="{{ route('shop.orders.checkout') }}">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section ('script')
    <script>
        let totalPrice = 0;

        $('.price').each(function (index, value) {
            totalPrice += + $(this).text();
        });

        $("#total_price").text(totalPrice);
    </script>

    <script>
        let totalWeight = 0;

        $('.weight').each(function (index, value) {
            totalWeight += + $(this).text();
        });

        $("#total_weight").text(totalWeight);
    </script>

    <script>
        $('.checkbox_delivery').on('click', function () {

            $('.checkbox_delivery').each(function (index, value) {
                let el = $(this);
                $("#method_" + el.data('name')).prop('checked', false);
                el.removeClass('active');
            });

            let li = $(this);
            let methodName = li.data('name');

            $("#method_" + methodName).prop("checked", true);
            li.addClass('active');
        });
    </script>
@endsection