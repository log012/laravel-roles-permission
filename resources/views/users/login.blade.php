@extends('welcome')

@section('title', 'Login')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Login</h1>
        @if (session('error'))
            <div class="bg-red-500 text-white p-2 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('users.login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="border rounded w-full py-2 px-3 mt-1" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="border rounded w-full py-2 px-3 mt-1" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
        </form>
    </div>
@endsection
