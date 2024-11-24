@extends('client.layouts.app')

@section('title', 'Vé của bạn')

@section('sass')
    
@endsection

@section('js')
    
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger w-fit mx-auto p-5 rounded-2xl bg-red-500 text-white my-6">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-xl p-8 w-full md:w-3/4 lg:w-1/2 mx-auto mt-8">
    <h1 class="text-green-700 font-semibold text-2xl md:text-3xl mb-6 text-center">Thông Tin Vé Đã Đăng Ký</h1>

    @if (Auth::check() && Auth::user()->ticket)
        <div class="overflow-x-auto mb-6">
            <table class="min-w-full bg-white shadow-lg rounded-xl">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="py-3 px-4 text-left">Loại Vé</th>
                        <th class="py-3 px-4 text-left">Tuyến</th>
                        <th class="py-3 px-4 text-left">Ngày Hết Hạn</th>
                        <th class="py-3 px-4 text-left">Trạng Thái</th>
                        <th class="py-3 px-4 text-left">Giá tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ Auth::user()->ticket->type }}</td>
                        <td class="py-3 px-4">{{ Auth::user()->ticket->route }}</td>
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse(Auth::user()->ticket->end_date)->format('d/m/Y') }}</td>
                        <td class="py-3 px-4">
                            <span class="{{ Auth::user()->ticket->active === 'Chờ duyệt' ? 'text-yellow-500' : 'text-green-500' }}">
                                {{ Auth::user()->ticket->active }}
                            </span>
                        </td>
                        <td class="py-3 px-4">{{ number_format(Auth::user()->ticket->price, 0, ',', '.') }} VND</td>

                    </tr>
                </tbody>
            </table>
        </div>

        {{-- QR Code và Hủy Vé --}}
        @if(Auth::user()->ticket->active !== 'Chờ duyệt')
            <div class="mb-4">
                <strong>QR Code:</strong>
                <div class="flex justify-center">
                    <img src="{{ Auth::user()->ticket->qr_code }}" alt="QR Code" class="h-16 w-16" />
                </div>
            </div>
        @endif

        @if(Auth::user()->ticket->active === 'Chờ duyệt')
            <div class="flex justify-center">
                <form action="{{ route('ticket.cancel', Auth::user()->ticket->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy vé?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700">
                        Hủy Vé
                    </button>
                </form>
            </div>
        @endif
    @else
        <div class="w-full p-8 bg-white rounded-2xl mx-auto text-center">
            <img src="{{ @asset('image/icon_image/bus-ticket.png') }}" alt="ve" class="w-1/2 mx-auto laptop:w-1/3 mb-4">
            <p class="text-2xl text-gray-700">Bạn chưa có vé, vui lòng đăng ký vé</p>
            <a href="{{ route('ticket.view') }}" class="mt-4 p-4 rounded-xl w-fit bg-green-700 text-center block text-white text-lg mx-auto hover:bg-green-800">
                Đăng ký vé
            </a>
        </div>
    @endif
</div>

@endsection
