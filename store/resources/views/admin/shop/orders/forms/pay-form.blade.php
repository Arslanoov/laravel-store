<form action="{{ route('admin.shop.orders.pay', $order) }}" method="POST">
    @csrf
    <button class="btn btn-primary" type="submit">Pay</button>
</form>