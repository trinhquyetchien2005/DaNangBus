@extends('client.layouts.app')

@section('title', 'Tin tức')

@section('sass')
    @vite('resources/sass/news.sass')
@endsection

@section('js')
    <script src="{{ asset('js/news.js') }}"></script>
@endsection

@section('content')
<div class="space-y-10">
    <h1 class="text-3xl font-semibold text-center text-green-700">Tin tức mới nhất</h1>

    <form action="{{ route('post.pages') }}" class=" flex flex-row gap-5 justify-center items-center w-full flex-wrap tablet:flex-nowrap tablet:justify-between">
        @csrf
        <div>
        <select name="sort" onchange="this.form.submit()" class="p-3 rounded-xl shadow-md bg-white">
            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Phổ biến</option>
        </select>
    
        <select name="type" onchange="this.form.submit()" class="p-3 rounded-xl shadow-md bg-white">
            <option value="">Tất cả loại</option>
            @foreach ($types as $type)
                <option value="{{ $type->type }}" {{ request('type') == $type->type ? 'selected' : '' }}>
                    {{ $type->type }}
                </option>
            @endforeach
        </select>
    </div>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm" class="float-right w-full h-8 tablet:h-10 rounded-full px-4 tablet:w-1/3">
    </form>
    
</div>

<p class="text-gray-600 text-center my-4">Trang {{ $posts->currentPage() }} trên {{ $posts->lastPage() }}</p>

<div class="mt-8 grid grid-cols-1 gap-4 tablet:grid-cols-2 laptop:grid-cols-3 desktop:grid-cols-4 laptop:gap-8">
    @foreach ($posts as $post)
    <div class="bg-white shadow-lg overflow-hidden p-5 rounded-xl">
        <img src="{{ $post->image_title }}" alt="Image" class="w-full rounded-lg h-60 object-cover">
        <div class="py-2 h-80">
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">{{ $post->title }}</h2>
            <p class="text-gray-600 text-base mb-4">{{ Str::limit($post->content, 100) }}</p>
            <a href="{{ route('post.view', ['id' => $post->id, 'page' => $posts->currentPage()]) }}" class="text-blue-500 hover:underline">Đọc tiếp</a>
        </div>
        <div class="flex flex-col text-sm text-gray-500">
            <span>Lượt xem: {{ $post->view }}</span>
            <span>Ngày đăng: {{ $post->created_at->format('d/m/Y') }}</span>
        </div>
    </div>
    @endforeach
</div>

<div class="pagination mt-8 text-center mx-auto">
    {{ $posts->links('pagination::tailwind') }}
</div>

@endsection
