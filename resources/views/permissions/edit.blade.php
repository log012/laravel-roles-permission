@extends('welcome')

@section('title', 'Edit Permission')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Edit Permission</h1>
        <form action="{{ route('permissions.update', $permission) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Permission Name</label>
                <input type="text" name="name" id="name" value="{{ $permission->name }}" class="border rounded w-full py-2 px-3 mt-1">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
