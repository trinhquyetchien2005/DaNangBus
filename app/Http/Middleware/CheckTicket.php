<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTicket
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu người dùng đã đăng nhập và đã có vé
        if (Auth::check() && Auth::user()->hasTicket()) {
            return redirect()->route('ticket.pages')->with('error', 'Bạn đã có vé. Không thể đăng ký lại.');
        }

        return $next($request);
    }
}
