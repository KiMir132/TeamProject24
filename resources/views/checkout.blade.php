<h1>Checkout</h1>

<div>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <label for="address">Address:</label><br>
        <textarea name="address" id="address" required>{{ old('address', auth()->user()->Address) }}</textarea>

        <button type="submit">Submit Order</button>
    </form>
</div>