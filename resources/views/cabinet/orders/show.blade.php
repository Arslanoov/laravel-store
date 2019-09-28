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

                    <h4>Order №{{ $order->id }}</h4>

                    <p>
                        @if ($order->canBePaid())
                            <a href="#" class="btn btn-success">Pay</a>
                        @endif

                        @if ($order->canBeCanceled())
                            <a href="#" id="cancel" class="btn btn-danger">Cancel</a>

                            @include ('cabinet.orders.cancel-form', $order)
                        @endif
                    </p>

                    <table class="table table-bordered table-striped table-responsive">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $order->user_id }}</td>
                                <th>Name</th><td>{{ $order->customerData->name }}</td>
                                <th>Surname</th><td>{{ $order->customerData->surname }}</td>
                                <th>Patronymic</th><td>{{ $order->customerData->patronymic }}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th><td>{{ $order->customerData->email }}</td>
                                <th>Phone</th><td>{{ $order->customerData->phone }}</td>
                                <th>Location</th><td>{{ $order->deliveryData->region->name }}</td>
                                <th>Code</th><td>{{ $order->deliveryData->code }}</td>
                            </tr>
                            <tr>
                                <th>Delivery Method Name</th><td>{{ $order->delivery_method_name }}</td>
                                <th>Delivery Method Cost</th><td>{{ $order->delivery_method_cost }}</td>
                                <th>Payment Method</th><td>{{ $order->payment_method ?: 'Not paid' }}</td>
                                <th>Cancel reason</th><td>{{ $order->cancel_reason ?? 'Not canceled' }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th><td>{{ date('d-M h:i', strtotime($order->created_at)) }}</td>
                                <th>Updated At</th><td>{{ date('d-M h:i', strtotime($order->updated_at)) }}</td>
                                <th>Cost</th><td>{{ $order->cost }}</td>
                                <th>Status</th>
                                <td>
                                    @if ($order->isNew())
                                        <span class="badge badge-danger">New</span>
                                    @endif

                                    @if ($order->isPaid())
                                        <span class="badge badge-info">Paid</span>
                                    @endif

                                    @if ($order->isSent())
                                        <span class="badge badge-info">Sent</span>
                                    @endif

                                    @if ($order->isCompleted())
                                        <span class="badge badge-success">Completed</span>
                                    @endif

                                    @if ($order->isCancelled())
                                        <span class="badge badge-danger">Cancelled</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h5>Note</h5>
                    <p>{{ $order->note }}</p>

                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Price for 1 item</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($order->items as $orderItem)
                            <tr>
                                <td><img src="{{ $orderItem->product->photos()->exists() ? $orderItem->product->photos()->first()->getUrl() : '' }}" alt="" width="100px"></td>
                                <td><a href="{{ route('shop.products.single', ['id' => $orderItem->product->id, 'slug' => $orderItem->product->slug]) }}">{{ $orderItem->product_name }}</a></td>
                                <td>{{ $orderItem->product_price }}</td>
                                <td>{{ $orderItem->product_quantity }}</td>
                                <td>{{ $orderItem->total_price }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section ('script')
    <script>
        $(document).on("click", "#cancel", function () {
            let cancelForm = $("#cancel-form");
            let cancelButton = $("#cancel");
            let isActiveForm = cancelButton.hasClass("form-active");

            if (isActiveForm) {
                cancelForm.css("display", "none");
                cancelButton.removeClass("form-active");
                cancelButton.text("Cancel");
            } else {
                cancelForm.css("display", "block");
                cancelButton.addClass("form-active");
                cancelButton.text("Remove form");
            }

            return false;
        });
    </script>
@endsection