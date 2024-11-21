<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
public function checkTicket()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để kiểm tra vé.');
    }

    $ticket = Ticket::where('customer_id', Auth::id())->first();

    if ($ticket) {
        return view('client.pages.ticket', ['ticket' => $ticket]);
    } else {
        return view('client.pages.ticket', ['message' => 'Bạn chưa có vé.']);
    }
}

}
