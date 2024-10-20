<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite('resources/sass/home.sass')
</head>
<body class="bg-green-100 text-gray-800 transition-colors duration-300">
    <header id="main-header" class=" sticky top-0 transition-colors duration-300">
        <div class="max-w-full mx-auto px-4 py-6">
            <div class="flex flex-row w-full justify-between">
                <a class="flex flex-row items-center w-fit" href="{{ route('home') }}">
                    <img class="w-16 pr-3" src="{{ asset('image/logo.png') }}" alt="logo">
                    <h1 class="text-3xl font-bold text-green-600">DaNangBus</h1>
                </a>
                <a class="flex flex-row items-center w-fit mr-10 md:m-0" href="{{ route('account') }}">
                    <h3 class="text-xl font-bold text-gray mr-2 hidden text-green-600 md:block">{{ Auth::user()->name}}</h3>
                    <img class="rounded-l-full w-16 pr-3 object-cover" 
                        src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('image/avatar.jpg') }}" alt="avatar">
                </a>
            </div>

            <!-- Nút Menu -->
            <button id="menu-button" type="button" class="absolute top-7 right-3 block p-2 text-sm text-green-500 rounded-lg md:hidden hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-200" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Navbar -->
            <nav class="mt-4 hidden w-full md:block" id="navbar-default">
                <ul class="flex-col md:flex md:flex-row space-y-4 navbar md:space-y-0 md:space-x-4 W-8/12 justify-end gap-6 pr-20 text-white navbar">
                    <li><a href="{{ route('home') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('ticket') }}">Đăng kí vé</a></li>
                    <li><a href="{{ route('map') }}">Bản đồ</a></li>
                    <li><a href="{{ route('news') }}">Tin tức</a></li>
                    <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                    <li>
                        <button id="theme-toggle" type="button" class="mr-3 rounded-md text-gray-500  focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <span id="theme-icon" class="material-icons">dark_mode</span>
                        </button>
                        <button id="language-toggle" type="button" class=" text-gray-500 rounded-lg  focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <span id="language-icon" class="material-icons">language</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <header id="secondary-header" class="sticky top-0 transition-colors duration-300">
        <div class="max-w-full mx-auto px-4 py-2">
            <div class="flex flex-col md:flex md:flex-row items-center">
                <h1 class="text-xl font-bold text-green-600">DaNangBus</h1>
                <nav class="mt-4 hidden w-full md:block" id="navbar-second-default">
                    <ul class="flex flex-col  md:flex md:flex-row space-y-4 navbar md:space-y-0 md:space-x-4 W-8/12 justify-end gap-6 pr-20 text-white navbar">
                        <li><a href="{{ route('home') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('ticket') }}">Đăng kí vé</a></li>
                        <li><a href="{{ route('map') }}">Bản đồ</a></li>
                        <li><a href="{{ route('news') }}">Tin tức</a></li>
                        <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                        <li>
                            <button id="second-theme-toggle" type="button" class="mr-3 rounded-md text-gray-500  focus:outline-none focus:ring-2 focus:ring-gray-200">
                                <span id="second-theme-icon" class="material-icons">dark_mode</span>
                            </button>
                            <button id="second-language-toggle" type="button" class=" text-gray-500 rounded-lg  focus:outline-none focus:ring-2 focus:ring-gray-200">
                                <span id="second-language-icon" class="material-icons">language</span>
                            </button>
                        </li>
                    </ul>
                </nav>
                <button id="menu-second-button" type="button" class=" block p-2 text-sm text-green-500 rounded-lg md:hidden hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-200" aria-controls="navbar-second-default" aria-expanded="false">
                    <span class="sr-only">Open second menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>
    

    <main class="py-10">
        <div class="max-w-full mx-auto px-6">
            @yield('content')
        </div>
    </main>

    <footer class="bg-white shadow mt-10 transition-colors duration-300"> <!-- Thêm class transition -->
        <div class="max-w-7xl mx-auto px-4 py-6">
            <p class="text-center text-gray-600">Bản quyền © 2024. Tất cả quyền được bảo lưu.</p>
        </div>
    </footer>

    <script>
        const menuButton = document.getElementById('menu-button');
        const menuSecondButton = document.getElementById('menu-second-button');
        const navbar = document.getElementById('navbar-default');
        const secondNavbar = document.getElementById('navbar-second-default');
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const secondthemeToggle = document.getElementById('second-theme-toggle');
        const secondthemeIcon = document.getElementById('second-theme-icon');
        const header = document.querySelector('header'); 
        const secondheader = document.getElementById('secondary-header'); 
        const footer = document.querySelector('footer'); 

        menuButton.addEventListener('click', () => {
            navbar.classList.toggle('hidden');
        });
        menuSecondButton.addEventListener('click', () => {
            secondNavbar.classList.toggle('hidden');
        });

        const currentTheme = localStorage.getItem('theme') || 'light';
        if (currentTheme === 'dark') {
            document.body.classList.add('dark');
            header.classList.add('dark'); // Thêm lớp dark cho header
            footer.classList.add('dark'); // Thêm lớp dark cho footer
            themeIcon.textContent = 'light_mode'; // Biểu tượng sáng
        }

        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark');
            header.classList.toggle('dark'); 
            secondheader.classList.toggle('dark'); 
            footer.classList.toggle('dark'); 
            if (document.body.classList.contains('dark')) {
                themeIcon.textContent = 'light_mode';
                localStorage.setItem('theme', 'dark');
            } else {
                themeIcon.textContent = 'dark_mode';
                localStorage.setItem('theme', 'light');
            }
        });
        
        if (currentTheme === 'dark') {
            document.body.classList.add('dark');
            header.classList.add('dark'); // Thêm lớp dark cho header
            secondheader.classList.add('dark'); // Thêm lớp dark cho header
            footer.classList.add('dark'); // Thêm lớp dark cho footer
            secondthemeIcon.textContent = 'light_mode'; // Biểu tượng sáng
        }

        secondthemeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark');
            header.classList.toggle('dark'); // Thay đổi theme cho header
            secondheader.classList.toggle('dark'); // Thay đổi theme cho header
            footer.classList.toggle('dark'); // Thay đổi theme cho footer
            if (document.body.classList.contains('dark')) {
                secondthemeIcon.textContent = 'light_mode';
                localStorage.setItem('theme', 'dark');
            } else {
                secondthemeIcon.textContent = 'dark_mode';
                localStorage.setItem('theme', 'light');
            }
        });

        const mainHeader = document.getElementById('main-header');
const secondaryHeader = document.getElementById('secondary-header');

// Đảm bảo secondaryHeader ẩn khi trang vừa load
document.addEventListener('DOMContentLoaded', () => {
    secondaryHeader.classList.add('hidden');
    mainHeader.classList.add('visible');
});

window.addEventListener('scroll', () => {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > 1) {
        mainHeader.classList.remove('visible');
        mainHeader.classList.add('hidden');
        secondaryHeader.classList.remove('hidden');
        secondaryHeader.classList.add('visible');
    } else {
        mainHeader.classList.remove('hidden');
        mainHeader.classList.add('visible');
        secondaryHeader.classList.remove('visible');
        secondaryHeader.classList.add('hidden');
    }
});


    </script>
</body>
</html>
