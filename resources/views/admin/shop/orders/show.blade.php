@extends('layouts.admin')

@section('content')
    @include('admin.shop.orders._nav')

    <div class="d-flex flex-row mb-3">
        <p>
            @if ($order->canBePaid())
                @include ('admin.shop.orders.forms.pay-form')
            @endif

            @if ($order->canBeCanceled())
                <button class="btn btn-danger" href="#" id="cancel" style="margin-left:2px;">Cancel</button>
            @endif

            @if ($order->canBeSent())
                @include ('admin.shop.orders.forms.send-form', $order)
            @endif

            @if ($order->canBeCompleted())
                @include ('admin.shop.orders.forms.complete-form', $order)
            @endif
        </p>
    </div>

    @if ($order->canBeCanceled())
        @include ('admin.shop.orders.forms.cancel-form', $order)
    @endif

    <h4>Order №{{ $order->id }}</h4>

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
                    <span class="badge badge-primary">Paid</span>
                @endif

                @if ($order->isSent())
                    <span class="badge badge-primary">Sent</span>
                @endif

                @if ($order->isCompleted())
                    <span class="badge badge-success">Completed</span>
                @endif

                @if ($order->isCancelledByCustomer())
                    <span class="badge badge-danger">Cancelled by customer</span>
                @endif

                @if ($order->isCancelledByAdmin())
                    <span class="badge badge-danger">Cancelled by Admin</span>
                @endif
            </td>
        </tr>
        </tbody>
    </table>

    <h5>Note</h5>
    <p>{{ $order->note ?: 'Empty' }}</p>

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
                <td><a href="{{ route('admin.shop.products.show', $orderItem->product) }}">{{ $orderItem->product_name }}</a></td>
                <td>{{ $orderItem->product_price }}</td>
                <td>{{ $orderItem->product_quantity }}</td>
                <td>{{ $orderItem->total_price }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <h5>Statuses History</h5>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th>Status</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th><span class="badge badge-danger">New</span></th>
            <td>{{ date('d-M h:i', strtotime($order->created_at)) }}</td>
        </tr>

        @foreach ($order->statuses as $status)
            <tr>
                <td>
                    @if ($status->isPaid())
                        <span class="badge badge-primary">Paid</span>
                    @endif

                    @if ($status->isSent())
                        <span class="badge badge-primary">Sent</span>
                    @endif

                    @if ($status->isCompleted())
                        <span class="badge badge-success">Completed</span>
                    @endif

                    @if ($status->isCancelledByCustomer())
                        <span class="badge badge-danger">Cancelled by customer</span>
                    @endif

                    @if ($status->isCancelledByAdmin())
                        <span class="badge badge-danger">Cancelled by Admin</span>
                    @endif
                </td>
                <td>{{ date('d-M h:i', strtotime($status->created_at)) }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
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