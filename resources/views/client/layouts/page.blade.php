<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script src="https://kit.fontawesome.com/dbdd38bf2c.js" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js', 'resources/sass/app.sass'])
    @yield('sass')
    @yield('js')
</head>
<body>
    <main class="py-5 bg-gray-100">
        <div class="max-w-full mx-auto px-6">
            @yield('content')
        </div>
    </main>
</body>
</html>
