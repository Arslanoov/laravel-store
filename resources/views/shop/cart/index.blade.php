@extends ('layouts.app')

@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
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
                            <th scope="col">Total</th>
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
                                    <h5>$<span class="price">{{ $cartItem->total }}</span></h5>
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
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>$<span id="total">0</span></h5>
                            </td>
                        </tr>
                        <tr class="shipping_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li><a href="#">Flat Rate: $5.00</a></li>
                                        <li><a href="#">Free Shipping</a></li>
                                        <li><a href="#">Flat Rate: $10.00</a></li>
                                        <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                    </ul>
                                    <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input type="text" placeholder="Postcode/Zipcode">
                                    <a class="gray_btn" href="#">Update Details</a>
                                </div>
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
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="{{ route('shop.products.index') }}">Continue Shopping</a>
                                    <a class="primary-btn" href="#">Proceed to checkout</a>
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
        let total = 0;

        $('.price').each(function (index, value) {
            total += + $(this).text();
        });

        $("#total").text(total);
    </script>
@endsection