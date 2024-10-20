<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; 


class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'phone' => 'required|numeric',
            'password' => 'required|string',
        ]);

        // Lấy thông tin đăng nhập
        $credentials = $request->only('phone', 'password');

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->intended('home'); // Chuyển hướng đến trang dashboard hoặc trang chính
        }

        // Đăng nhập thất bại
        return back()->withErrors([
            'phone' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|unique:users', 
            'password' => 'required|string|min:8|confirmed', 
        ]);

        if ($validator->fails()) {
            return back()->withErrors('Mật khẩu không trùng khớp');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
