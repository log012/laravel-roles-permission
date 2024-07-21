@extends('welcome')

@section('title', 'View User')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">View User</h1>
        <div class="mb-4">
            <label class="block text-gray-700">Name:</label>
            <p class="border rounded w-full py-2 px-3 mt-1">{{ auth()->user()->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Email:</label>
            <p class="border rounded w-full py-2 px-3 mt-1">{{ auth()->user()->email }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Roles:</label>
            @foreach ($user->roles as $role)
                <span class="bg-gray-200 px-2 py-1 rounded">{{ auth()->user()->hasRole() }}</span>
            @endforeach
        </div>
        <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Users</a>
        <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit User</a>
        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete User</button>
        </form>
    </div>
@endsection
