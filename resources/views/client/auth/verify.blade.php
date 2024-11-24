<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác minh OTP</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">
    <div id="verifyForm" class="bg-white max-w-md mx-auto rounded-xl shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Xác minh OTP</h1>
        
        @if(session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('otp.verify.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="otp_code" class="block mb-2">Nhập mã OTP đã nhận:</label>
                <input type="text" id="otp_code" name="otp_code" class="w-full p-2 border rounded" required>
            </div>
            <input type="hidden" name="phone" value="{{ session('phone') }}">
            <button class="w-full bg-blue-500 text-white p-2 rounded mt-4 hover:bg-blue-600" type="submit">Xác minh</button>
        </form>

        <form action="{{ route('otp.resend') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="w-full bg-gray-500 text-white p-2 rounded hover:bg-gray-600">Gửi lại mã OTP</button>
        </form>
    </div>
</body>
</html>
