@extends ('layouts.app')

@section ('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('shop.orders.checkout', compact('regions')) }}">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <form method="POST" action="{{ route('shop.orders.checkoutForm') }}">
        @csrf

        <section class="checkout_area section_gap">
            <div class="container">
                <div class="billing_details">
                    <div class="row">

                        @include ('layouts.partials.flash')

                        <div class="col-lg-8">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach

                            <h3>Billing Details</h3>

                            <div class="col-md-4 form-group p_star">
                                Name: <b>{{ $user->name }}</b>
                            </div>
                            <div class="col-md-4 form-group p_star">
                                Surname: <b>{{ $user->profile->surname }}</b>
                            </div>
                            <div class="col-md-4 form-group p_star">
                                Patronymic: <b>{{ $user->profile->patronymic }}</b>
                            </div>
                            <div class="col-md-4 form-group p_star">
                                Email: <b>{{ $user->email }}</b>
                            </div>
                            <div class="col-md-4 form-group p_star">
                                Phone: <b>{{ $user->profile->phone }}</b>
                            </div>
                            <div class="col-md-4 form-group p_star">
                                Code: <b>{{ $user->profile->code }}</b>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="region">Location</label> <br>
                                <select class="shipping_select" id="region" name="region" style="width:100%">
                                    <option class="not_selected" selected>Not Selected</option>
                                    @foreach ($regions as $region)
                                        <option data-value="{{ $region->id }}" value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="shipping_box">
                                    <label for="method">Delivery Method</label> <br>
                                    <ul class="list">
                                        @foreach ($deliveryMethods as $method)
                                            <li class="checkbox_delivery" data-name="{{ $method->name }}" data-price="{{ $method->cost }}">
                                                <a href="javascript:void(0)">{{ $method->name }}: ${{ $method->cost }}</a>
                                                <input type="checkbox" name="delivery" id="method_{{ $method->name }}" style="display: none" value="{{ $method->id }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                </div>
                                <textarea class="form-control" name="note" id="message" rows="5" cols="10" placeholder="Order Notes"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list">
                                    <li><a href="javascript:void(0)">Product <span>Total</span></a></li>
                                    @foreach ($cartItems as $cartItem)
                                        <li>
                                            <a href="{{ route('shop.products.single', ['id' => $cartItem->product->id, 'slug' => $cartItem->product->slug]) }}">
                                                {{ $cartItem->product->title }}
                                                <span class="middle">x {{ $cartItem->quantity }}</span>
                                                <span class="last">$<span class="price">{{ $cartItem->total_price }}</span></span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li><a href="javascript:void(0)">Subtotal <span>$<span id="subtotal">0</span></span></a></li>
                                    <li><a href="javascript:void(0)">Shipping <span>$<span id="shipping">0</span></span></a></li>
                                    <li><a href="javascript:void(0)">Total <span>$<span id="total">0</span></span></a></li>
                                </ul>
                                <div class="creat_account">
                                    <input type="checkbox" id="terms" name="terms">
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                                <button class="primary-btn" type="submit">Proceed to payment</button>
                                <a class="primary-btn" href="#" role="button">Proceed to payment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection

@section ('script')
    <script>
        let subtotalPrice = 0;

        $('.price').each(function (index, value) {
            subtotalPrice += + $(this).text();
        });

        $("#subtotal").text(subtotalPrice);
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

            let price = $(this).data("price");
            $('#shipping').text(price);

            recountTotalPrice();
        });
    </script>

    <script>
        $('.shipping_select').on('change', function () {
            let select = this;
            let optionSelected = $("option:selected", this);
            let regionId = optionSelected.data('value');

            let isReset = $(optionSelected).hasClass('reset');
            let isNotSelected = $(optionSelected).hasClass('not_selected');

            isReset ? isReset = 1 : isReset = 0;

            if (!isNotSelected) {
                $.ajax({
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": "/shop/order/region",
                    "method": "POST",
                    "data": {
                        regionId: regionId,
                        isReset: isReset
                    },
                    "success": function (data) {
                        if (data) {
                            $(select).html(data);
                        }
                    }
                });
            }
        });
    </script>

    <script>
        function recountTotalPrice() {
            let subtotalPrice = $("#subtotal").text();
            let deliveryPrice = $("#shipping").text();
            let price = +subtotalPrice +  +deliveryPrice;

            $("#total").text(price);
        }
    </script>
@endsection