@extends('client.layouts.app')

@section('title', $post->title)

@section('content')
<div class="container mx-auto py-10">
    <!-- Nút back với giữ lại trang hiện tại -->
    <div class="mb-6">
        <a href="{{ route('post.pages', ['page' => $currentPage]) }}" class="text-green-500 hover:text-green-700 font-semibold flex items-center w-full object-cover">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Quay lại danh sách bài viết
        </a>
    </div>

    <h1 class="text-4xl font-semibold text-center text-green-700">{{ $post->title }}</h1>

    <div class="mt-8">
        <img src="{{ $post->image_title }}" alt="Image" class="w-full h-64 object-cover rounded-lg shadow-md">

        <div class="mt-6">
            <p class="text-lg text-gray-700">{{ $post->content }}</p>
        </div>

        <div class="mt-6 flex justify-between items-center">
            <p class="text-sm text-gray-500">Số lượt xem: {{ $post->view }}</p>
            <div class="text-sm text-gray-500">Ngày đăng: {{ $post->created_at->format('d/m/Y') }}</div>
        </div>
    </div>
</div>
@endsection
