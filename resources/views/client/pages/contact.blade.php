@extends('client.layouts.app')

@section('title', 'Liên hệ')

@section('sass')
    
@endsection

@section('js')

@endsection

@section('content')
<div class="space-y-20">

    <div class="w-full bg-green-700 text-white rounded-xl p-2 flex flex-col laptop:flex-row laptop:p-10">
        <div class="flex flex-col gap-4 p-5 text-left">
            <h1 class="font-semibold text-4xl  ">Liên hệ với chúng tôi</h1>
            <p class="text-xl">Bất cứ những góp ý phản hồi về DaNangBus hay những điều gì bạn muốn, hãy chia sẻ tại đây</p>
        </div>
        <img class="max-w-32 mx-auto motion-preset-bounce " src="{{ @asset('image/icon_image/broadcaster.png') }}" alt="icon">
</div>

<div class="space-y-4 rounded-2xl justify-center items-center bg-green-200 flex flex-col laptop:flex-row ">
    <div class="p-5 space-y-5 laptop:flex-1 laptop:p-40 laptop:text-xl">
        <h2 class="text-center text-2xl font-semibold ">Thông tin liên hệ</h2>
        <p class=""><i class="fa-solid fa-briefcase"></i>  Khu C3, 493 Trần Cao Vân, Q. Thanh Khê, Tp. Đà Nẵng</p>
        <p><i class="fa-solid fa-phone"></i> 0236 3711 468</p>
        <p><i class="fa-solid fa-envelope"></i> datramac123@gmail.com</p>
    </div>
    <img class="rounded-2xl w-full laptop:flex-1 laptop:w-1/2" src="{{ @asset('image/customer/pexels-van-tay-media-1429346-2789303.jpg') }}" alt="team">
</div>

<div class="bg-green-700 w-full rounded-xl p-6 flex flex-col justify-center items-center laptop:flex-row">
    <p class="text-3xl flex-1 p-4 text-white">Bất cứ những góp ý phản hồi về DaNangBus hay những điều gì bạn muốn, hãy chia sẻ tại đây!</p>
    <div class="flex-1 bg-white p-6 mx-10 w-full rounded-2xl tablet:mx-20 laptop:mx-0">
        <h3 class="text-center text-2xl font-semibold my-4 text-green-700">Ý kiến phản hồi</h3>
        <form action="{{ route('contact.feedback')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Tên của bạn <span class="text-red-500">*</span></label>
                <input type="text" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Tiêu đề<span class="text-red-500">*</span></label>
                <input type="text" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-medium mb-2">Nội dung tin nhắn <span class="text-red-500">*</span></label>
                <textarea id="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>
            <div class="mb-4">
                <a href="#" class="text-green-600 hover:underline">Đính kèm hình ảnh</a>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="px-6 py-2 bg-green-500 text-white font-medium rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Gửi tin nhắn</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection