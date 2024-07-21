@extends('welcome')

@section('title', 'Assign Permissions')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Assign Permissions to {{ $role->name }}</h1>
        <form action="{{ route('roles.permissions.update', $role) }}" method="POST">
            @csrf
            @method('PUT')
            @foreach ($permissions as $permission)
                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                               @if ($role->permissions->contains($permission)) checked @endif
                               class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                    </label>
                </div>
            @endforeach
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
@endsection
