<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body>
    <x-navbar />
    <div class="flex justify-center items-center mt-32">
        <div class="flex flex-col items-center">
            <h1 class="text-xl font-bold">LOGIN</h1>
            <form action="{{ route('loginAuth') }}" method="POST" class="flex flex-col gap-4 mt-2">
                @csrf
                <input type="text" name="username" class="input input-bordered input-md" placeholder="Username">
                <input type="password" name="password" class="input input-bordered input-md" placeholder="Password">
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
