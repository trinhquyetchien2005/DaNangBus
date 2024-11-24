<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TicketController extends Controller
{
public function checkTicket()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để kiểm tra vé.');
    }

    $ticket = Auth::user()->ticket; // Trả về vé của người dùng

if ($ticket) {
    $ticket->end_date = \Carbon\Carbon::parse($ticket->end_date)->format('d-m-Y');
    return view('client.pages.ticket', ['ticket' => $ticket]);
} else {
    return view('client.pages.ticket', ['message' => 'Bạn chưa có vé.']);
}
}

public function getTicket(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để kiểm tra vé.');
        }

        // Lấy thông tin vé của khách hàng dựa trên customer_id
        $ticket = Ticket::where('customer_id', Auth::id())->first();

        // Kiểm tra nếu vé tồn tại
        if ($ticket) {
            // Trả về view với thông tin vé
            return view('client.pages.ticket', ['ticket' => $ticket]);
        } else {
            // Nếu không có vé, trả về thông báo
            return view('client.pages.ticket', ['message' => 'Bạn chưa có vé.']);
        }
    }

public function registration(Request $request)
{
    $ticketData = $request->validate([
        'ticketType' => 'required|in:Single_Line,inter_line,Full_line',
        'expiry' => 'required|in:one_month,three_month,six_month,twelve_month',
        'singleLineSelect' => 'nullable|required_if:ticketType,Single_Line',
        'interLineSelect' => 'nullable|required_if:ticketType,inter_line',
    ]);

    $monthsMap = [
        'one_month' => 1,
        'three_month' => 3,
        'six_month' => 6,
        'twelve_month' => 12,
    ];
    $expiryMonths = $monthsMap[$ticketData['expiry']] ?? 0; 
    $expiryDate = Carbon::now('Asia/Ho_Chi_Minh')->addMonths($expiryMonths);

    $route = null;
if ($ticketData['ticketType'] === 'Single_Line') {
    $route = $ticketData['singleLineSelect'];
} elseif ($ticketData['ticketType'] === 'inter_line') {
    $route = $ticketData['interLineSelect'];
} elseif ($ticketData['ticketType'] === 'Full_line') {
    $route = 'All';  
}


    $ticketPrice = $this->calculateTicketPrice($ticketData['ticketType'], $route, $ticketData['expiry']);
    if (is_string($ticketPrice)) {
        return back()->withErrors(['ticketPriceError' => $ticketPrice]);
    }

    $data = [
        'user' => Auth::user(),
        'ticketType' => $ticketData['ticketType'],
        'expiry' => $ticketData['expiry'],
        'expiryDate' => $expiryDate->format('d/m/Y'), 
        'route' => $route,
        'ticketPrice' => number_format($ticketPrice) . ' VND',
    ];

    return view('client.pages.ticket_pay', $data);
    return view('client.pages.ticket', $data);
}

public function calculateTicketPrice($ticketType, $route, $expiry)
{
    $prices = [
        'Single_Line' => [
            '01' => 100000, 
            '02' => 150000, 
            '03' => 200000, 
            '04' => 120000, 
            '05' => 130000, 
            '06' => 140000,
            '07' => 110000, 
            '08' => 150000, 
            '10' => 160000, 
            '11' => 120000, 
            '12' => 130000, 
            '15' => 150000, 
            '16' => 140000, 
            '17' => 160000, 
        ],
        'inter_line' => [  // Đảm bảo tên key là đúng
            'LK01' => 190000,
            'LK02' => 200000,
            'LK21' => 175000,
        ],
        'Full_line' => [  // Sửa cho khớp với tên loại vé
            'All' => 300000,
        ]
    ];

    // Kiểm tra nếu loại vé không tồn tại trong mảng giá vé
    if (!isset($prices[$ticketType])) {
        return 'Không tìm thấy loại vé này';
    }

    // Kiểm tra tuyến đường có tồn tại trong loại vé không
    $basePrice = $prices[$ticketType][$route] ?? 0;

    if ($basePrice === 0) {
        return 'Không tìm thấy giá vé cho loại vé và tuyến đường này';
    }

    // Tính giá vé theo thời gian sử dụng
    $expiryMultiplier = 1;
    switch ($expiry) {
        case 'one_month':
            $expiryMultiplier = 1;
            break;
        case 'three_month':
            $expiryMultiplier = 3;
            break;
        case 'six_month':
            $expiryMultiplier = 6;
            break;
        case 'twelve_month':
            $expiryMultiplier = 12;
            break;
        default:
            return 'Thời gian sử dụng không hợp lệ';
    }

    // Tính giá cuối cùng
    $finalPrice = $basePrice * $expiryMultiplier;

    return $finalPrice;
}

public function cancel(Ticket $ticket)
{
    // Kiểm tra quyền xóa (chỉ chủ sở hữu vé mới được xóa)
    if ($ticket->customer_id !== Auth::id()) {
        return redirect()->route('ticket.pages')->with('error', 'Bạn không có quyền hủy vé này.');
    }

    // Xóa vé
    $ticket->delete();

    // Trả về thông báo thành công
    return redirect()->route('ticket.pages')->with('message', 'Vé đã được hủy thành công.');
}
}
