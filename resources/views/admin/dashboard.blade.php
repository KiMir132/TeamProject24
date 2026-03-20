@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="stats">
    <div class="stat-card">
        <h2>{{ $totalProducts }}</h2>
        <p>Total Products</p>
    </div>
    <div class="stat-card">
        <h2>{{ $totalOrders }}</h2>
        <p>Total Orders</p>
    </div>
    <div class="stat-card">
        <h2>{{ $totalUsers }}</h2>
        <p>Total Users</p>
    </div>
    <div class="stat-card">
        <h2>{{ $lowStock }}</h2>
        <p>Low Stock Items</p>
    </div>
</div>
@endsection