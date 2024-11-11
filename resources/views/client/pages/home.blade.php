@extends('client.layouts.app')

@section('sass')
    @vite('resources/sass/home.sass')
@endsection

@section('js')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('title', 'Trang Chủ')
    
@section('content')
<div class="h-full bg-cover bg-center bg-fixed rounded-xl text-white text-center py-5 px-3 " style="background-image: url('{{ asset('image/background/bgwelcome.jpg') }}');">
    <h1 class="text-sm font-bold tablet:text-lg desktop:text-xl">Chào mừng đến với DaNangBus</h1>
    <hr class="py-2 w-3/4 tablet:w-40 mx-auto laptop:w-52">
    <h1 class="text-2xl font-bold pb-3 tablet:w-3/4 tablet:mx-auto tablet:text-3xl desktop:text-3xl 2.5k:text-5xl">Xe buýt Đà Nẵng đi cùng nhịp sống, đến mọi nẻo đường</h1>
    <p class="text-sm tablet:w-1/2 tablet:mx-auto desktop:text-xl 2.5k:text-2xl">Dịch vụ xe buýt Đà Nẵng là một trong những phương tiện công cộng chính, giúp người dân và du khách di chuyển dễ dàng, an toàn và tiết kiệm</p>
    <div class="flex flex-col justify-center items-center space-y-3 my-5 tablet:flex-row tablet:justify-between tablet:px-5 tablet:space-y-0 desktop:justify-around 2.5k:flex-row-reverse">
        <a class="bg-blue-600 rounded-lg px-4 w-full py-2 tablet:py-2 tablet:w-fit" href="#">xem thêm</a>
        <div class="bg-white px-5 py-2 rounded-lg space-x-4 w-full tablet:w-fit tablet:mt-0">
            <a href=""><i class="fa-brands fa-facebook fa-lg" style="color: #1e64dc;"></i></a>
            <a href=""><i class="fa-brands fa-tiktok fa-lg" style="color: #1e64dc;"></i></a>
            <a href=""><i class="fa-brands fa-instagram fa-lg" style="color: #1e64dc;"></i></a>
            <a href=""><i class="fa-solid fa-location-dot fa-lg" style="color: #1e64dc;"></i></a>
        </div>
    </div>
    <div class="bg-white rounded-lg h-fit my-5 p-3 text-black tablet:p-5 tablet:mx-auto  desktop:w-5/6 desktop:mx-auto 2.5k:w-3/5" >
        <form action="{{ route('search') }}" method="POST" class="space-y-3 tablet:space-y-5 2.5k:space-y-8">
            @csrf
            <input class="block border p-2 w-full rounded-xl tablet:px-3 shadow-lg" type="text" placeholder="Điểm đi">
            <i class="fa-solid fa-arrows-up-down" style="color: #5e5e5e;"></i>
            <input class="block border p-2 w-full rounded-xl tablet:px-3 shadow-lg" type="text" placeholder="Điểm đến">
            <input type="submit" value="Tìm kiếm" class="block px-4 py-1 w-full mx-auto bg-blue-600 rounded-xl text-white tablet:py-2 tablet:w-1/2">
        </form>
    </div>
</div>

<div class="mt-20 text-center flex flex-col space-y-8 laptop:flex-row-reverse laptop:gap-12 laptop:space-y-14 laptop:mt-10 2.5k:mt-20">
    <div class="flex flex-col space-y-6 laptop:flex-1 laptop:justify-center 2.5k:space-y-20 slide-left" data-effect="slide-left">
        <div class="font-semibold space-y-6 tablet:text-left">
            <p class="text-blue-600 tablet:font-extrabold 2.5k:text-lg">VỀ CHÚNG TÔI</p>
            <h1 class="text-3xl tablet:text-4xl laptop:w-9/12 laptop:text-4xl 2.5k:text-6xl">Hệ thống xe bus uy tín và hiện đại</h1>
        </div>
        
        <div class="flex flex-col space-y-6 tablet:flex-row tablet:gap-4 laptop:space-y-0 laptop:space-x-4 ">
            <div class="space-y-2 p-8 rounded-xl font-semibold shadow-xl tablet:flex-1 tablet:content-center laptop:p-12 2.5k:p-14">
                <h2 id="year_experiences" class="text-3xl laptop:text-4xl 2.5k:text-5xl">30+</h2>
                <p class="text-xl laptop:text-2xl 2.5k:text-3xl">Năm hoạt động</p>
            </div>
            <div class="space-y-6 tablet:flex-1">
                <p class="tablet:text-left laptop:text-lg 2.5k:text-xl">Đà Nẵng Bus đã và đang xây dựng niềm tin vững chắc trong lòng người dùng, góp phần thúc đẩy giao thông công cộng và bảo vệ môi trường.</p>
                <a class="bg-blue-700 text-white block p-2 rounded-xl tablet:w-fit tablet:px-7" href="#">Xem thêm</a>
            </div>
        </div>
    </div>
        
    <div class="flex flex-col space-y-6 tablet:flex-row tablet:space-x-4 tablet:space-y-0 laptop:flex-1 slide-right" data-effect="slide-right">
        <img src="{{@asset('image/customer/hanhkhach.jpg')}}" alt="customer" class="rounded-xl tablet:flex-1 tablet:w-1/2">
        <div class="space-y-6 tablet:flex-1">
            <iframe width="853" height="480" src="https://www.youtube.com/embed/jM0cwBvP5SM" title="Giới thiệu hệ thống xe buýt trợ giá Đà Nẵng" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" class="w-full h-auto rounded-xl tablet:h-1/2"  allowfullscreen></iframe>
            <div class=" border-l-2 border-blue-600 text-left px-7 py-1 space-y-4 tablet:space-y-8">
                <p class="font-normal tablet:text-lg laptop:text-sm 2.5k:text-xl quote">
                    "Xe buýt Đà Nẵng mang đến sự tiện lợi với lộ trình đa dạng, chi phí hợp lý và kết nối hầu hết các điểm du lịch, giúp di chuyển dễ dàng, an toàn và thân thiện với môi trường."
                </p>
                <p class="font-semibold 2.5k:text-lg">
                    -Trịnh Quyết Chiến (Dev DNBUS)
                </p>
            </div>
        </div>
    </div>
</div>

<div class="mt-24 bg-gray-800 text-white text-center py-10 px-6 space-y-6 rounded-2xl antialiased">   
    <h3 class="font-extrabold text-md ">DỊCH VỤ</h3>
    <h1 class="font-semibold text-3xl laptop:text-4xl">Một vài dịch vụ nỗi bật của chúng tôi</h1>
    <p>
        Dịch vụ xe buýt Đà Nẵng mang đến phương tiện di chuyển tiện lợi, an toàn và giá cả phải chăng, kết nối các điểm trong thành phố và khu vực lân cận, phục vụ tốt cho nhu cầu đi lại của người dân và du khách.
    </p>
    <a href="#" class="block bg-blue-600 p-2 rounded-xl tablet:w-fit tablet:inline-block tablet:px-10">Xem thêm</a>
    <div class="flex flex-col text-center space-y-6 p-4 tablet:grid tablet:grid-cols-2 tablet:space-y-0 tablet:gap-6 2.5k:flex 2.5k:flex-row">
        <div class="space-y-8 border rounded-2xl p-10 flex-1 slide-up" data-effect="slide-up">
            <img src="{{ @asset('image/icon_image/front-of-bus.png')}}" alt="bus" class="w-1/2 tablet:w-1/3 laptop:w-1/4 2.5k:w-1/5 mx-auto">
            <h3 class="font-bold">Dịch vụ liên tuyến</h3>
            <p class="hidden tablet:block">
                Dịch vụ liên tuyến là hình thức vận tải kết nối giữa nhiều tuyến xe hoặc phương tiện giao thông khác nhau, nhằm tạo thuận lợi cho hành khách trong việc di chuyển từ điểm này đến điểm khác mà không cần phải đổi xe nhiều lần
            </p>
            <a href="#" class="block text-blue-400">Xem thêm</a>
        </div>
        <div class="space-y-8 border rounded-2xl p-10 flex-1 slide-up" data-effect="slide-up">
            <img src="{{ @asset('image/icon_image/old-man.png')}}" alt="bus" class="w-1/2 tablet:w-1/3 laptop:w-1/4 2.5k:w-1/5 mx-auto">
            <h3 class="font-bold">Dịch vụ trợ giá</h3>
            <p class="hidden tablet:block">
                Dịch vụ trợ giá cho học sinh và người cao tuổi trong hệ thống xe buýt nhằm mục đích giảm chi phí đi lại và tạo điều kiện thuận lợi cho những đối tượng này trong việc sử dụng phương tiện giao thông công cộng.
            </p>
            <a href="#" class="block text-blue-300">Xem thêm</a>
        </div>
        <div class="space-y-8 border rounded-2xl p-10 flex-1 slide-up" data-effect="slide-up">
            <img src="{{ @asset('image/icon_image/tickets.png')}}" alt="bus" class="w-1/2 tablet:w-1/3 laptop:w-1/4 2.5k:w-1/5 mx-auto">
            <h3 class="font-bold">Dịch vụ vé điện tử</h3>
            <p class="hidden tablet:block">
                Dịch vụ vé điện tử là một hình thức thanh toán hiện đại, cho phép hành khách sử dụng vé xe buýt mà không cần phải mua vé giấy. Dưới đây là một số đặc điểm và lợi ích của dịch vụ vé điện tử
            </p>
            <a href="#" class="block text-blue-300">Xem thêm</a>
        </div>
        <div class="space-y-8 border rounded-2xl p-10 flex-1 slide-up" data-effect="slide-up">
            <img src="{{ @asset('image/icon_image/city.png')}}" alt="bus" class="w-1/2 tablet:w-1/3 laptop:w-1/4 2.5k:w-1/5 mx-auto">
            <h3 class="font-bold">Dịch vụ nội thành</h3>
            <p class="hidden tablet:block">
                Dịch vụ xe buýt nội thành là hệ thống vận tải công cộng hoạt động trong phạm vi một thành phố, phục vụ nhu cầu đi lại của người dân và du khách. Dưới đây là một số đặc điểm và lợi ích của dịch vụ này
            </p>
            <a href="#" class="block text-blue-300">Xem thêm</a>
        </div>
    </div>
</div>

<div class="mt-20 space-y-6">
    <div class="text-center space-y-5">
        <h3 class="font-extrabold text-blue-600 ">XE BUS</h3>
        <h1 class="font-semibold text-4xl">Những mẫu xe của chúng tôi</h1>
    </div>
    <div class="grid gird-cols-1 gap-40 tablet:gap-10 laptop:gap-10 laptop:grid-cols-2 2.5k:grid-cols-3 2.5k:gap-10">

        <div class="rounded-xl h-96 relative tablet:h-auto laptop:h-full 2.5k:h-auto tablet:mb-4 laptop:mb-40 2.5k:mb-10 shadow-xl">
            <img src="{{ @asset('image/bus/pexels-anhtuan-10822379.jpg') }}" alt="bus" class="h-full w-full object-cover rounded-xl">
            <div class="absolute top-52 rounded-xl p-8 bg-white w-full space-y-4 border tablet:bottom-0 tablet:top-auto laptop:p-11">
                <h3 class="font-semibold text-2xl tablet:text-3xl laptop:text-2xl">VinBus</h3>
                <p class="text laptop:text-xl"><i class="fa-solid fa-user-group"></i> 30 chổ ngồi</p>
                <p class="laptop:text-lg">Đây là loại xe buýt điện đang được thử nghiệm và dần đưa vào sử dụng ở Đà Nẵng năng lượng điện bảo vệ môi trường.</p>
                <a href="#" class="block bg-blue-600 text-center p-2 text-white rounded-xl">Xem thêm</a>
            </div>
        </div>

        <div class="rounded-xl h-96 relative tablet:h-auto laptop:h-full 2.5k:h-auto tablet:mb-4 laptop:mb-40 2.5k:mb-10 shadow-xl">
            <img src="{{ @asset('image/bus/pexels-tuongchopper-18391295.jpg') }}" alt="bus" class="h-full w-full object-cover rounded-xl">
            <div class="absolute top-52 rounded-xl p-8 bg-white w-full space-y-4 border tablet:bottom-0 tablet:top-auto laptop:p-11">
                <h3 class="font-semibold text-2xl tablet:text-3xl laptop:text-2xl">Samco Felix</h3>
                <p class="text laptop:text-xl"><i class="fa-solid fa-user-group"></i> 40 chỗ ngồi</p>
                <p class="laptop:text-lg"> Loại xe này thường được DanaBus sử dụng trên các tuyến phổ biến và có lưu lượng hành khách cao.</p>
                <a href="#" class="block bg-blue-600 text-center p-2 text-white rounded-xl">Xem thêm</a>
            </div>
        </div>

        <div class="rounded-xl h-96 relative tablet:h-auto laptop:h-full 2.5k:h-auto tablet:mb-4 laptop:mb-40 2.5k:mb-10 shadow-xl">
            <img src="{{ @asset('image/bus/pexels-anhtuan-10098511.jpg') }}" alt="bus" class="h-full w-full object-cover rounded-xl">
            <div class="absolute top-52 rounded-xl p-8 bg-white w-full space-y-4 border tablet:bottom-0 tablet:top-auto laptop:p-11">
                <h3 class="font-semibold text-2xl tablet:text-3xl laptop:text-2xl"> Tracomeco</h3>
                <p class="text laptop:text-xl"><i class="fa-solid fa-user-group"></i> 50 chỗ ngồi</p>
                <p class="laptop:text-lg">Loại xe buýt này có từ 50 chỗ ngồi trở lên, bao gồm cả chỗ đứng, phù hợp cho các tuyến dài như Đà Nẵng Hội An.</p>
                <a href="#" class="block bg-blue-600 text-center p-2 text-white rounded-xl">Xem thêm</a>
            </div>
        </div>

    </div>
</div>

<div class="mt-44 space-y-10 tablet:mt-20 2.5k:mt-10">
    <div class="space-y-4">
    <h1 class="block text-center font-semibold text-green-800 text-2xl laptop:text-3xl">DANANGBUS-CHẤT LƯỢNG LÀ DANH DỰ</h1>
    <p class="text-sm text-gray-700 text-center">Được khách hàng tin tưởng và lựa chọn</p>
    </div>
    <div class="flex flex-col justify-center items-center tablet:flex-row bg-white p-10 rounded-xl shadow-xl">
        <div class="space-y-10 tablet:w-1/2 2.5k:space-y-16">
            <div class="flex flex-row gap-3 justify-start items-center">
                <img src="{{ @asset('image/icon_image/customer.png') }}" alt="customer" class="object-cover size-12 laptop:size-16">
                <div>
                    <h1 class="text-black text-xl font-semibold laptop:text-2xl">HƠN 250.000 KHÁCH HÀNG</h1>
                    <p class="text-gray-700 text-sm laptop:text-md">DaNangBus phục vụ hơn 250 nghìn khách hàng mỗi tháng tại Đà Nẵng</p>
                </div>
            </div>
            <div class="flex flex-row gap-3 justify-start items-center">
                <img src="{{ @asset('image/icon_image/localization.png') }}" alt="" class="object-cover size-12 laptop:size-16">
                <div>
                    <h1 class="text-black text-xl font-semibold laptop:text-2xl">HƠN 400 TRẠM DỪNG </h1>
                    <p class="text-gray-700 text-sm laptop:text-md">Có hơn 400 trạm và điểm đón xe bus trên địa phận Đà Nẵng</p>
                </div>
            </div>
            <div class="flex flex-row gap-3 justify-start items-center">
                <img src="{{ @asset('image/icon_image/bus-stop (1).png') }}" alt="" class="object-cover size-12 laptop:size-16">
                <div>
                    <h1 class="text-black text-xl font-semibold laptop:text-2xl">HƠN 300 XE BUS HOẠT ĐỘNG</h1>
                    <p class="text-gray-700 text-sm laptop:text-md">Có 11 tuyến xe và hơn 300 xe bus hoạt động mỗi ngày</p>
                </div>
            </div>
        </div>
        <img src="{{ @asset('image/icon_image/public-service.png') }}" alt="group" class="hidden tablet:flex tablet:w-1/2 tablet:p-14 laptop:w-1/3 2.5k:w-1/3">
    </div>
</div>

<div class="space-y-10 mt-20">
    <div class="space-y-4">
        <h1 class="text-center text-2xl text-green-700 font-semibold laptop:text-3xl">
            DANANGBUS GẮN LIỀN VỚI ĐỜI SỐNG
        </h1>
        <p class="text-center text-sm text-gray-700">
            Di chuyển bằng xe bus là thói quen của đại đa số người dân Đà Nẵng
        </p>
    </div>
    <div class="flex flex-col laptop:flex-row gap-10">
        <div id="indicators-carousel" class="relative w-full laptop:w-1/2 h-screen flex-1" data-carousel="static">
            <div class="relative h-screen overflow-hidden rounded-xl shadow-xl">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="{{ @asset('image/bus/pexels-vietnam-photographer-25424377.jpg') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" 
                        alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ @asset('image/bus/pexels-nguyendesigner-4627242.jpg') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" 
                        alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ @asset('image/bus/pexels-tuongchopper-18391295.jpg') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" 
                        alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ @asset('image/bus/pexels-guvluck-710374-1546985.jpg') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" 
                        alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ @asset('image/bus/pexels-miami302-20837343.jpg') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" 
                        alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-0 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2 ">
                <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="true"
                        aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="false"
                        aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="false"
                        aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="false"
                        aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="false"
                        aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <div class="flex-1 my-auto bg-white p-10 rounded-xl shadow-xl">
            <h1 class="text-2xl font-semibold text-green-700 border-l-2 px-2 border-green-700 mb-10 laptop:mb-12">CÁCH ĐI XE BUS</h1>
            <div class="grid gird-cols-1 gap-10 laptop:gap-20">
                <div class="flex flex-row gap-6 justify-center items-center w-full">
                    <img src="{{ @asset('image/icon_image/number-1.png') }}" alt="number" class="size-16 laptop:size-20">
                    <div>
                        <h1 class="font-semibold text-lg laptop:text-xl">XÁC ĐỊNH LỘ TRÌNH</h1>
                        <p class="text-gray-700 text-sm laptop:text-lg">Chọn nơi xuất phát và nơi bạn cần tới hệ thống sẽ hiện tuyến thích hợp nhất cho bạn một cách hợp lý nhất</p>
                    </div>
                </div>
                <div class="flex flex-row gap-6 justify-center items-center w-full">
                    <img src="{{ @asset('image/icon_image/number-2.png') }}" alt="number" class="size-16 laptop:size-20">
                    <div>
                        <h1 class="font-semibold text-lg laptop:text-xl">XEM ĐỊNH VỊ XE</h1>
                        <p class="text-gray-700 text-sm laptop:text-lg">Để căn thời gian hợp lý hơn và không để lỡ chuyến xe cũng như chờ lâu bạn có thể xem định vị xe bus đã đi tới đâu và di chuyển ra trạm</p>
                    </div>
                </div>
                <div class="flex flex-row gap-6 justify-center items-center w-full">
                    <img src="{{ @asset('image/icon_image/number-3.png') }}" alt="number" class="size-16 laptop:size-20">
                    <div>
                        <h1 class="font-semibold text-lg laptop:text-xl">CHỜ TẠI TRẠM</h1>
                        <p class="text-gray-700 text-sm laptop:text-lg">Khi chờ tại trạm bạn có thể xác định lại mình đã tới đúng trạm chưa bằng map hoặc mã trạm in trên trạm</p>
                    </div>
                </div>
                <div class="flex flex-row gap-6 justify-center items-center w-full">
                    <img src="{{ @asset('image/icon_image/number-4.png') }}" alt="number" class="size-16 laptop:size-20">
                    <div>
                        <h1 class="font-semibold text-lg laptop:text-xl">THANH TOÁN</h1>
                        <p class="text-gray-700 text-sm laptop:text-lg">Bạn có thể trả bằng tiền mặt hoặc vé đã mua từ trước cho tài xế và tận hưỡng hành trình</p>
                    </div>
                </div>
                <div class="flex flex-row gap-6 justify-center items-center w-full">
                    <img src="{{ @asset('image/icon_image/number-5.png') }}" alt="number" class="size-16 laptop:size-20">
                    <div>
                        <h1 class="font-semibold text-lg laptop:text-xl">XUỐNG ĐÚNG TRẠM</h1>
                    <p class="text-gray-700 text-sm laptop:text-lg">Bạn có thể xác định xe đã tới trạm muốn tới chưa bằng cách xem map và bấm chuông để được xuống trạm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-20 space-y-10 bg-white rounded-xl shadow-xl p-10">
    <h1 class="text-center font-semibold text-xl text-green-700 laptop:text-3xl">CẤP PHÉP HOẠT ĐỘNG</h1>
    <div class="grid grid-cols-1 tablet:grid-cols-2 laptop:grid-cols-3 text-center gap-10">
        <div class="space-y-4">
            <img src="{{ @asset('image/icon_image/images.png') }}" alt="UY BAN NHAN DAN" class="size-28 mx-auto rounded-full">
            <p class="font-bold laptop:text-xl">Ủy ban nhân dân thành phố Đà Nẵng</p>
        </div>
        <div class="space-y-4">
            <img src="{{ @asset('image/icon_image/images (1).png') }}" alt="SO GIAO THONG VAN TAI" class="size-28 mx-auto rounded-full">
            <p class="font-bold laptop:text-xl">Sở giao thông vận tải thành phố Đà Nẵng</p>
        </div>
        <div class="space-y-4">
            <img src="{{ @asset('image/icon_image/image (3).png') }}" alt="SO TAI NGUYEN VA MOI TRUONG" class="size-28 mx-auto rounded-full">
            <p class="font-bold laptop:text-xl">Sở tài nguyên và môi trường thành phố Đà Nẵng</p>
        </div>
    </div>
</div>
@endsection
