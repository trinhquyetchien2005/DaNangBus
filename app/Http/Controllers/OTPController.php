<?php
namespace App\Http\Controllers;

use App\Services\SpeedSMSService;
use App\Models\OTP;
use App\Models\Customers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class OTPController extends Controller
{
    protected $smsService;

    public function __construct(SpeedSMSService $smsService)
    {
        $this->smsService = $smsService;
    }

    // Hiển thị trang đăng ký
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Gửi OTP
    public function sendOtp(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'phone_number' => 'required|regex:/^0[0-9]{9}$/|unique:otps,phone',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Lưu thông tin đăng ký vào session để sử dụng sau khi xác minh OTP
        session([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone_number,
            'password' => $request->password,
        ]);

        // Tạo mã OTP
        $otpCode = random_int(100000, 999999); // Tạo mã OTP 6 chữ số
        $expiresAt = Carbon::now()->addMinutes(5); // OTP hết hạn sau 5 phút

        // Lưu OTP vào cơ sở dữ liệu
        OTP::create([
            'phone' => $request->phone_number,
            'otp_code' => $otpCode,
            'expires_at' => $expiresAt
        ]);

        // Gửi OTP qua SMS
        $message = "Mã OTP của bạn là: $otpCode. Có hiệu lực trong 5 phút.";
        $this->smsService->sendSMS($request->phone_number, $message);

        // Chuyển hướng đến trang xác minh OTP
        return redirect()->route('otp.verify')->with('phone', $request->phone_number);
    }

    public function showVerifyForm()
    {
        return view('client.auth.verify');
    }

    // Xác minh OTP
    public function verifyOtp(Request $request)
    {
        // Kiểm tra OTP trong cơ sở dữ liệu
        $otp = OTP::where('phone', $request->phone)
                  ->where('otp_code', $request->otp_code)
                  ->first();
    
        if (!$otp || Carbon::now()->greaterThan($otp->expires_at)) {
            return redirect()->route('otp.verify')->with('error', 'OTP không hợp lệ hoặc đã hết hạn');
        }
    
        // Lưu thông tin khách hàng vào cơ sở dữ liệu
        Customers::create([  // Sử dụng model Customer
            'name' => session('name'),
            'email' => session('email'),
            'phone_number' => $request->phone,  // Chắc chắn dùng đúng trường 'phone_number'
            'password' => Hash::make(session('password')),
            'is_active' => true,  // Thiết lập khách hàng là hoạt động mặc định
        ]);
    
        // Đánh dấu OTP đã xác thực
        $otp->update(['is_verified' => true]);
    
        // Xóa thông tin đăng ký khỏi session
        session()->forget(['name', 'email', 'phone', 'password']);
    
        // Chuyển hướng đến trang đăng nhập hoặc trang chính
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }
    
    public function resendOtp(Request $request)
{
    $phone = session('phone');  // Lấy số điện thoại từ session

    // Kiểm tra nếu không có số điện thoại trong session
    if (!$phone) {
        return back()->with('error', 'Số điện thoại không hợp lệ.');
    }

    // Tạo OTP mới và lưu vào database
    $otpCode = random_int(100000, 999999); // Tạo mã OTP mới
    $expiresAt = Carbon::now()->addMinutes(5); // OTP hết hạn sau 5 phút

    // Lưu OTP vào database
    OTP::updateOrCreate(
        ['phone' => $phone], 
        ['otp_code' => $otpCode, 'expires_at' => $expiresAt]
    );

    // Gửi OTP qua SMS
    $message = "Mã OTP của bạn là: $otpCode. Có hiệu lực trong 5 phút.";
    $this->smsService->sendSMS($phone, $message);

    return back()->with('success', 'Mã OTP mới đã được gửi đến số điện thoại của bạn.');
}


}
