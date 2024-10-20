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
<div id="registerForm" class="bg-white max-w-md  mx-auto rounded-xl shadow-lg p-6">
    <a href="login" class="text-blue-500 mb-4 inline-block hover:underline">&lt; Quay lại</a>
    <h1 class="text-2xl font-bold mb-4 text-center">Đăng kí</h1>
    <form action="{{ route('register') }}" method="POST" class="grid grid-cols-2 gap-4">
        @csrf
        <div class="form-group col-span-2">
            <label for="name" class="block mb-2">Họ và tên:</label>
            <input type="text" id="name" name="name" class="w-full p-2 border rounded" required>
        </div>
        <div class="form-group">
            <label for="email" class="block mb-2">Email:</label>
            <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
        </div>
        <div class="form-group ">
            <label for="phone" class="block mb-2">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded" required>
        </div>
        <div class="form-group">
            <label for="password" class="block mb-2">Mật khẩu:</label>
            <input type="password" id="password" name="password" class="w-full p-2 border rounded" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="block mb-2">Xác nhận mật khẩu:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border rounded" required>
        </div>
        <button class="block col-span-2 w-full bg-green-500 text-white p-2 rounded mt-4 hover:bg-green-600" type="submit">Đăng kí</button>
    </form>
</div>
</div>
</body>
</html>