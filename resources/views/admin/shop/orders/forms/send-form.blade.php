<form action="{{ route('admin.shop.orders.sent', $order) }}" method="POST">
    @csrf
    <button class="btn btn-primary" type="submit">Send</button>
</form>