<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Roles and Permissions')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-800 p-4 text-white flex justify-evenly">
        <div class="container mx-auto">
            <a href="/" class="text-xl">Roles and Permissions</a>
        </div>
       <div class="flex">
        <div class="container  mx-2">
            <a href="{{route('users.index')}}" class="text-xl">Users</a>
        </div>
        <div class="container mx-2">
            <a href="{{route('roles.index')}}" class="text-xl">Roles</a>
        </div>
        <div class="container mx-2">
            <a href="{{route('permissions.index')}}" class="text-xl">Permissions</a>
        </div>
        @if (Auth::check())
        <div class="container mx-2">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit"  class="text-xl">Logout</button>
            </form>
            
        </div>
        @else
        <div class="container mx-2">
            <a href="{{route('users.loginView')}}" class="text-xl">Login</a>
        </div>
        @endif
       
       
       </div>
       
    </nav>
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</body>
</html>
