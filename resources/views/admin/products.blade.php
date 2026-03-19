@extends('admin.layout')

@section('title', 'Products')

@section('content')
<h1>Products</h1>

<a href="{{ route('admin.products.create') }}" class="btn-primary">Add Product</a>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->Name }}</td>
            <td>{{ $product->Type }}</td>
            <td>{{ number_format($product->Price, 2) }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product) }}" class="btn-primary">Edit</a>
                <form action="{{ route('admin.products.delete', $product) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-primary">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $products->links() }}
@endsection