@extends('admin.layout')

@section('title','Manage Users')

@section('content')
<h1>Users</h1>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->Is_admin ? 'Yes' : 'No' }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user->UID) }}" class="btn-primary">Edit</a>
                <form action="{{ route('admin.users.delete', $user->UID) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-primary">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection