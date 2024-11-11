<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập & Đăng Kí</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    @vite('resources/sass/login.sass')
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">
    <div class="container mx-auto p-4">
        <!-- Form Đăng Nhập -->
        <div id="loginForm" class="bg-white text-black max-w-md mx-auto rounded-xl shadow-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-center">Đăng nhập</h1>
            @if (session('success'))
    <div class="bg-green-500 text-white p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-500 text-white p-2 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div class="form-group">
                    <label for="email" class="block mb-2">Email:</label>
                    <input type="tel" id="email" name="email" class="w-full p-2 border rounded-lg" required>
                </div>
                <div class="form-group">
                    <label for="password" class="block mb-2">Mật khẩu:</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border rounded-lg" required>
                </div>
                <div>
                    <input type="checkbox" name="remember" class="mx-1">Lưu tài khoản
                    <a href="#" class="float-end py-3 text-green-500">Quên mật khẩu?</a>
                </div>
                
                <button class="block w-full bg-green-500 text-white p-2 rounded-lg mt-4 hover:bg-green-600" type="submit">Đăng nhập</button>
                <p class="text-center pt-4">Bạn chưa có tài khoản? <a href="register" class="text-green-500 cursor-pointer hover:underline">Đăng kí</a></p>
            </form>
        </div>
</body>
</html>
