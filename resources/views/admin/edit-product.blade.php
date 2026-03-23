@extends('admin.layout')

@section('title','Edit Product')

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('admin.products.update',$product) }}" method="POST" enctype="multipart/form-data" class="admin-form">
    @csrf
    <input type="text" name="Name" value="{{ $product->Name }}" required>
    <textarea name="Description">{{ $product->Description }}</textarea>
    <input type="text" name="Type" value="{{ $product->Type }}" required>
    <input type="number" name="Price" step="0.01" value="{{ $product->Price }}" required>
    <input type="number" name="Quantity" value="{{ $product->Quantity }}" required>
    <input type="file" name="Image">
    <button type="submit" class="btn-primary">Update Product</button>
</form>
@endsection