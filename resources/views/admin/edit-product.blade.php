@extends('layouts.app')

@section('title', 'Edit Product – Admin – E-Quipment')

@section('content')

<section>
    <h1>Edit Product</h1>
</section>

<main>
<form action="{{ route('admin.products.update', $product->ProductID) }}" method="POST">
    @csrf
    <div>
        <label for="Name">Name</label>
        <input type="text" id="Name" name="Name" value="{{ $product->Name }}" required>
    </div>
    <div>
        <label for="Description">Description</label>
        <textarea id="Description" name="Description" required>{{ $product->Description }}</textarea>
    </div>
    <div>
        <label for="Type">Category</label>
        <input type="text" id="Type" name="Type" value="{{ $product->Type }}" required>
    </div>
    <div>
        <label for="Price">Price (£)</label>
        <input type="number" id="Price" name="Price" step="0.01" value="{{ $product->Price }}" required>
    </div>
    <div>
        <label for="Quantity">Quantity</label>
        <input type="number" id="Quantity" name="Quantity" value="{{ $product->Quantity }}" required>
    </div>
    <button type="submit">Update Product</button>
</form>
</main>

@endsection