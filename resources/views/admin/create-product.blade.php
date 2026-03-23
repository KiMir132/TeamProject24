@extends('admin.layout')

@section('title','Add Product')

@section('content')
<h1>Add Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
    @csrf
    <input type="text" name="Name" placeholder="Product Name" value="{{ old('Name') }}" required>
    <textarea name="Description" placeholder="Description">{{ old('Description') }}</textarea>
    <input type="text" name="Type" placeholder="Type" value="{{ old('Type') }}" required>
    <input type="number" name="Price" placeholder="Price" step="0.01" value="{{ old('Price') }}" required>
    <input type="number" name="Quantity" placeholder="Stock Quantity" value="{{ old('Quantity') }}" required>
    <input type="file" name="Image">
    <button type="submit" class="btn-primary">Create Product</button>
</form>
@endsection