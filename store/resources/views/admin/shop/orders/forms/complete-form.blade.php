<form action="{{ route('admin.shop.orders.complete', $order) }}" method="POST">
    @csrf
    <button class="btn btn-success" type="submit">Complete</button>
</form>