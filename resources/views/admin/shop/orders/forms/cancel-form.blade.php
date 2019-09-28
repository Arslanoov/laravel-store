<div class="form-group">
    <form action="{{ route('admin.shop.orders.cancel', $order) }}" method="POST" style="display: none" id="cancel-form">
        @csrf

        <div class="form-group">
            <p><label for="reason">Cancel reason:</label></p>
            <textarea name="reason" id="reason" cols="70" rows="5">{{ old('reason') }}</textarea>
        </div>

        <button class="btn btn-danger">Cancel</button>
    </form>
</div>