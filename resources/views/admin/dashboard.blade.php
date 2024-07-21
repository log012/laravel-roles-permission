@extends('welcome')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
            
            <!-- Dashboard Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-blue-500 text-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Total Users</h2>
                    <p class="text-3xl">{{ $totalUsers }}</p>
                </div>
                {{-- <div class="bg-green-500 text-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Active Users</h2>
                    <p class="text-3xl">{{ $activeUsers }}</p>
                </div>
                <div class="bg-yellow-500 text-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Pending Requests</h2>
                    <p class="text-3xl">{{ $pendingRequests }}</p>
                </div> --}}
                <div class="bg-red-500 text-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Total Roles</h2>
                    <p class="text-3xl">{{ $totalRoles }}</p>
                </div>
            </div>
            
            <!-- Users Table -->
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-xl font-bold mb-4">Recent Users</h2>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b-2 border-gray-300">Name</th>
                            <th class="py-2 px-4 border-b-2 border-gray-300">Email</th>
                            <th class="py-2 px-4 border-b-2 border-gray-300">Role</th>
                            {{-- <th class="py-2 px-4 border-b-2 border-gray-300">Status</th> --}}
                            <th class="py-2 px-4 border-b-2 border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentUsers as $user)
                            <tr>
                                <td class="py-2 px-4 border-b-2 border-gray-300">{{ $user->name }}</td>
                                <td class="py-2 px-4 border-b-2 border-gray-300">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b-2 border-gray-300">{{ $user->roles->pluck('name')->join(', ') }}</td>
                                {{-- <td class="py-2 px-4 border-b border-gray-300">
                                    <span class="{{ $user->is_active ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td> --}}
                                <td class="py-2 px-4 border-b-2 border-gray-300">
                                    <a href="{{ route('users.edit', $user) }}" class="text-blue-500">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
