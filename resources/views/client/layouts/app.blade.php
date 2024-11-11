<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script src="https://kit.fontawesome.com/dbdd38bf2c.js" crossorigin="anonymous"></script>
    @vite('resources/sass/app.sass')
    @yield('sass')
    <script src="{{ asset('js/header.js') }}"></script>
    @yield('js')
</head>
<body>
    <header class="max-w-full sticky top-0 bg-white z-10">
        <div class="h-16 flex px-5 items-center flex-grow justify-between space-x-5 md:flex md:justify-between md:items-center relative">
            <div class=" logo w-fit px-5">
                <a href="#" class="flex flex-row justify-center items-center float-start">
                    <img src="{{ asset('image/icon_image/logo.png') }}" alt="logo" class="w-10 h-10">
                    <h1 class="ml-2 text-2xl font-semibold text-green-500 mobile:text-xl tablet:text-xl desktop:text-lg 2.5k:text-2xl">DaNangBus</h1>
                </a>            
            </div>
            <div class="flex-grow flex-col w-fit hidden laptop:flex laptop:justify-around ">
                <ul class="flex justify-center space-x-10">
                    <li>
                        <a href="{{ route('home.pages') }}">Trang Chủ</a>
                    </li>
                    <li>
                        <a href="{{ route('news.pages') }}">Tin Tức</a>
                    </li>
                    <li>
                        <a href="{{ route('map.pages') }}">Bản Đồ</a>
                    </li>
                    <li>
                        <a href="#">Vé Của Bạn</a>
                    </li>
                    <li>
                        <a href="#">Liên Hệ</a>
                    </li>
                </ul>
            </div>
            <div class=" w-fit px-3 flex flex-row space-x-3 items-center justify-center">
                <a href="#">
                    <i class="fa-regular fa-bell fa-xl" style="color: #005eff;"></i>
                </a>
                
                @auth
                    <p class="text-gray-800 font-semibold hidden mobile:block">{{ Auth::user()->name }}</p>
                    <img src="{{ asset(Auth::user()->avatar ? 'storage/' . Auth::user()->avatar : 'image/icon_image/avatar.jpg') }}"
                    alt="{{ Auth::user()->name }}"
                    class="w-10 h-10 rounded-full object-cover">

                @else
                    <a href="{{ route('login') }}" class="hidden tablet:flex text-white font-semibold mr-4 py-1 px-3 bg-blue-500 rounded-xl">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="hidden tablet:flex text-blue-500 font-semibold">Đăng ký</a>
                @endauth
                
                <div class="laptop:hidden">
                    <button id="menu-button" class="text-gray-800 focus:outline-none">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div id="mobile-menu" class="absolute w-fit p-5 right-5 hidden bg-white shadow-lg top-16 z-50">
                        <ul class="flex flex-col space-y-3">
                            <li>
                                <a href="{{ route('home.pages') }}">Trang Chủ</a>
                            </li>
                            <li>
                                <a href="{{ route('news.pages') }}">Tin Tức</a>
                            </li>
                            <li>
                                <a href="{{ route('map.pages') }}">Bản Đồ</a>
                            </li>
                            <li>
                                <a href="#">Đăng Ký Vé</a>
                            </li>
                            <li>
                                <a href="#">Liên Hệ</a>
                            </li>
                            @auth
                            <li>
                                <p class="text-gray-800 font-semibold hidden mobile:block">{{ Auth::user()->name }}</p>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('login') }}">Đăng Nhập</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Đăng kí</a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="py-5 bg-gray-100">
        <div class="max-w-full mx-auto px-6">
            @yield('content')
        </div>
    </main>
    
    <footer class="max-w-full h-fit flex flex-col text-white mt-20">
        <div class="flex-1 bg-green-800 grid grid-cols-1 p-8 gap-10">
            <div>
                <p class="laptop:text-2xl">TRUNG TÂM TỖNG ĐÀI & CSKH</p>
                <p class="text-2xl text-yellow-300 laptop:text-4xl">1 900 6067</p>
            </div>
            <div class="grid grid-cols-1 tablet:grid-cols-2 gap-10 laptop:grid-cols-3 justify-around laptop:gap-16">
                <div class="space-y-5">
                    <h1 class="border-b-2 w-fit pr-4 font-extrabold laptop:text-xl 2.5k:text-2xl">LIÊN HỆ</h1>
                    <div class="space-y-3 laptop:text-xl 2.5k:text-2xl 2.5k:space-y-6">
                        <p> <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i> Khu C3, 493 Trần Cao Vân, Q. Thanh Khê, Tp. Đà Nẵng</p>
                        <p><i class="fa-solid fa-phone-volume" style="color: #ffffff;"></i> 0236 3711 468</p>
                        <p><i class="fa-solid fa-envelope" style="color: #ffffff;"></i> datramac123@gmail.com</p>
                    </div>
                </div>
                <div class="space-y-5">
                    <h1 class="border-b-2 w-fit pr-4 font-extrabold laptop:text-xl 2.5k:text-2xl">LIÊN KẾT WEBSITE</h1>
                    <div class="space-y-3 laptop:text-xl 2.5k:text-2xl 2.5k:space-y-6">
                        <p><a href="#">UBND TP Đà Nẵng</a></p>
                        <p><a href="#">Sở giao thông vận tải</a></p>
                        <p><a href="#">Sở tài nguyên & môi trường</a></p>
                    </div>
                </div>
                <div class="space-y-5">
                    <h1 class="border-b-2 w-fit pr-4 font-extrabold laptop:text-xl 2.5k:text-2xl">TẢI XUỐNG</h1>
                    <div class="space-y-3 laptop:text-xl 2.5k:text-2xl 2.5k:space-y-6">
                        <p>IOS</p>
                        <p>Android</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-1/5 bg-green-950 text-center px-2 py-6">
            <span>&copy;2024</span>
            <span>Develop by Trinh Quyet Chien </span>
        </div>
    </footer>
</body>
</html>
