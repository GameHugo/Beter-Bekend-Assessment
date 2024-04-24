<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
<aside class="w-1/6 h-screen bg-gray-200 fixed flex flex-col justify-between">
    <nav class="p-4">
        <h1 class="text-2xl font-bold">Navigation</h1>
        <ul class="mt-4 flex flex-col gap-2 text-lg">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('projects.index') }}">Projects</a></li>
        </ul>
    </nav>
    <form action="{{ route('logout') }}" method="post" class="p-4">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 transition text-white p-1 rounded-md w-1/2">
            Logout
        </button>
    </form>
</aside>
<main class="w-5/6 min-h-screen pb-5 bg-gray-100 float-end">
    @yield('content')
</main>
</body>
</html>
