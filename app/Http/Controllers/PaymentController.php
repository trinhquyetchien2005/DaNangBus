<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{

public function direct(Request $request)
{
    // dd($request->all());
    $paymentMethod = $request->input('payment_method');
    $ticketType = $request->input('ticket_type'); // Loại vé
    $ticketPrice = $request->input('ticket_price'); // Tiền vé
    $route = $request->input('route'); // Tuyến đường
    $expiry = $request->input('expiry'); // Hạn sử dụng
    
    switch ($ticketType) {
        case 'Single_Line':
            $ticketType = 'Đơn tuyến'; // Gán 6 tháng
            break;
        case 'inter_line':
            $ticketType = 'Liên tuyến'; // Gán 12 tháng
            break;
        case 'Full_line':
            $ticketType = 'Toàn tuyến'; // Gán 3 tháng
            break;
        }

    switch ($expiry) {
        case 'six_month':
            $expiry = 6; // Gán 6 tháng
            break;
        case 'twelve_month':
            $expiry = 12; // Gán 12 tháng
            break;
        case 'three_month':
            $expiry = 3; // Gán 3 tháng
            break;
        case 'one_month':
            $expiry = 1; // Gán 1 tháng
            break;
        default:
            $expiry = 0; // Gán giá trị mặc định nếu không khớp với bất kỳ trường hợp nào
            break;
    }
    $endDate = now()->addMonths($expiry); // Ngày hết hạn (ví dụ, thêm số tháng vào ngày hiện tại)
    
    $ticketPrice = str_replace([',', 'VND'], '', $ticketPrice);

    $activeStatus = 'Chờ duyệt';
    // Tạo mã QR (bạn có thể sử dụng bất kỳ thư viện nào để tạo mã QR hoặc sử dụng một giá trị tạm thời)
    $qrCode = 'QR_' . uniqid();

    // Sử dụng Eloquent để lưu thông tin vé vào bảng tickets với trạng thái 'Chờ duyệt'
    Ticket::create([
        'customer_id' => Auth::id(), // ID người dùng hiện tại
        'type' => $ticketType,
        'end_date' => $endDate,
        'route' => $route,
        'price' => $ticketPrice,
        'active' => $activeStatus,
        'expiry' => $expiry,
        'qr_code' => $qrCode,
        'payment_method' => $paymentMethod,
    ]);

    // Sau khi lưu, bạn có thể chuyển hướng hoặc trả về thông báo
    return redirect()->route('ticket.pages')->with('message', 'Thanh toán thành công, vé đang chờ duyệt!');
}


}
