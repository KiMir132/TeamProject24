@extends('admin.layout')

@section('title','Manage Orders')

@section('content')
<h1>Orders</h1>

<table class="table">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Update Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->OrderID }}</td>
            <td>{{ $order->user?->name ?? 'Unknown' }}</td>
            <td>{{ number_format($order->TotalPrice,2) }}</td>
            <td>{{ $order->Status }}</td>
            <td>
                <form action="{{ route('admin.orders.update', $order->OrderID) }}" method="POST">
                    @csrf
                    <input type="text" name="status" value="{{ $order->Status }}">
                    <button type="submit" class="btn-primary">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection