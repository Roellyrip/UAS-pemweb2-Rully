@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h1 class="my-4">User List</h1>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified At</th>
                <th>Action</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at ?? 'Not Verified' }}</td>
                    <td>
                        <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>
                    </td>
                    <!-- Add more columns as needed -->
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
