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
<aside class="w-1/6 h-screen bg-gray-200 fixed">
    <nav class="p-4">
        <h1 class="text-xl font-bold">Navigation</h1>
        <ul class="mt-4">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('projects.index') }}">Projects</a></li>
            <li class="mt-4">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
</aside>
<main class="w-5/6 min-h-screen pb-5 bg-gray-100 float-end">
    @yield('content')
</main>
</body>
</html>
