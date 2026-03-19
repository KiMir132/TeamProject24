@extends('layout')

@section('title','Add Product')

@section('content')
<h1>Add Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST" class="admin-form">
    @csrf
    <input type="text" name="name" placeholder="Product Name" value="{{ old('name') }}" required>
    <input type="text" name="type" placeholder="Type" value="{{ old('type') }}" required>
    <input type="number" name="price" placeholder="Price" step="0.01" value="{{ old('price') }}" required>
    <button type="submit" class="btn-primary">Create Product</button>
</form>
@endsection