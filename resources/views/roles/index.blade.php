@extends('welcome')

@section('title', 'Roles')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Roles</h1>
        <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Role</a>
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="border px-4 py-2">{{ $role->name }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('roles.edit', $role) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                            <a href="{{ route('roles.permissions', $role) }}" class="bg-green-500 text-white px-4 py-2 rounded">Permissions</a>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
