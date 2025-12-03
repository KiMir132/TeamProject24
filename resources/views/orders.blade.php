<h1>Your Orders</h1>

<div>
    @if($orders->isEmpty())
        <p>No previous orders</p>
    @else
        @foreach($orders as $order)
            <div>
                <h3>Order #{{ $order->OrderID }}</h3>
                <p>Date: {{ $order->Order_date }}</p>
                Items:<br>

                @foreach($order->items as $item)
                    <div>
                        {{ $item->product->Name }}  
                        (x{{ $item->Quantity }}) — 
                        £{{ number_format($item->Price, 2) }}
                    </div>
                @endforeach

                <p>Total: £{{ number_format($order->items->sum(fn($i) => $i->Price * $i->Quantity), 2) }}</p>
            </div>
        @endforeach
    @endif
</div>