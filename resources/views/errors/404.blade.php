@extends('client.layouts.app')

@section('title', '404')
    
@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-blue-600 dark:text-blue-500">404</h1>
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Trang không tồn tại.</p>
            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Xin lỗi, chúng tôi không thể tìm thấy trang bạn muốn truy cập. Vui lòng trở về trang chủ.</p>
            <a href="{{ route('home') }}" class="inline-flex text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-900 my-4">Quay lại trang chủ</a>
        </div>   
    </div>
</section>
@endsection