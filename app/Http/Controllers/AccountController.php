<?php

// app/Http/Controllers/AccountController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    // Hiển thị thông tin tài khoản
    public function show()
    {
        $customer = Auth::user();  // Lấy thông tin khách hàng hiện tại
        return view('client.pages.account', compact('customer'));
    }

    // Cập nhật thông tin tài khoản
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $customer = Auth::user();  // Lấy khách hàng hiện tại

        // Cập nhật các trường thông tin
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->date_of_birth = $request->input('date_of_birth');
        $customer->gender = $request->input('gender');
        $customer->phone_number = $request->input('phone_number');
        $customer->is_active = $request->input('is_active');

        // Nếu có thay đổi avatar, lưu avatar mới
        if ($request->hasFile('avatar')) {
            // Xóa avatar cũ nếu có
            if ($customer->avatar) {
                Storage::delete('public/avatars/' . $customer->avatar);
            }

            // Lưu avatar mới
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $customer->avatar = basename($avatar);
        }

        // Lưu thông tin khách hàng
        $customer->save();

        return redirect()->route('account.show')->with('success', 'Thông tin tài khoản đã được cập nhật.');
    }
}
