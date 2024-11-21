@extends('client.layouts.app')

@section('title', 'Vé của bạn')

@section('sass')
    
@endsection

@section('js')
    
@endsection

@section('content')
@if(isset($ticket))
    <div>
        <img src="data:image/png;base64,{{ $ticket->qr_code }}" alt="QR Code">
        <h1>Thông tin vé</h1>
        <p>Loại vé: {{ $ticket->type }}</p>
        <p>Hạn sử dụng: {{ $ticket->end_date }}</p>
        <p>Tuyến: {{ $ticket->route }}</p>
    </div>
@else
    <div class="w-full p-4 bg-white rounded-2xl mx-auto laptop:w-2/3 space-y-4">
        <img src="{{ @asset('image/icon_image/bus-ticket.png') }}" alt="ve" class="w-1/2 mx-auto laptop:w-1/3">
        <p class="text-2xl text-center ">Bạn chưa có vé vui lòng đăng kí vé</p>
        <a href="#" class="text-center block">Đăng kí vé </a>
    </div>
@endif
@endsection