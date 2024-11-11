<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực số điện thoại</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    @vite('resources/sass/login.sass')
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white max-w-md mx-auto rounded-xl shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Xác thực số điện thoại</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('verify.code') }}" method="POST" class="space-y-4">
            @csrf
            <div class="form-group">
                <label for="code" class="block mb-2">Mã xác thực:</label>
                <input type="text" id="code" name="code" class="w-full p-2 border rounded" required>
            </div>
            <button class="block w-full bg-blue-500 text-white p-2 rounded mt-4 hover:bg-blue-600" type="submit">Xác thực</button>
        </form>
    </div>
</body>
</html>
