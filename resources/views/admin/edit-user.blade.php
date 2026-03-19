@extends('layouts.app')

@section('title', 'Edit User – Admin – E-Quipment')

@section('content')

<section>
    <h1>Edit User</h1>
</section>

<main>
<form action="{{ route('admin.users.update', $user->UID) }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
    </div>
    <div>
        <label for="Is_admin">Admin</label>
        <select id="Is_admin" name="Is_admin">
            <option value="0" {{ !$user->Is_admin ? 'selected' : '' }}>No</option>
            <option value="1" {{ $user->Is_admin ? 'selected' : '' }}>Yes</option>
        </select>
    </div>
    <button type="submit">Update User</button>
</form>
</main>

@endsection