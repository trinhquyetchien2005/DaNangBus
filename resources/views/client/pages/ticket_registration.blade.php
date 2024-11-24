@extends('client.layouts.page')

@section('js')
    <script src="{{ @asset('js/ticket.js') }}"></script>
@endsection

@section('sass')
    
@endsection

@section('content')
    <div class="container mx-auto mt-10">
        <form action="{{ route('ticket.registration') }}" method="POST" class="bg-white rounded-xl shadow-xl p-12 w-full md:w-1/2 mx-auto">
            @csrf
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <a href="{{ route('ticket.pages') }}" class="text-left text-blue-500 font-semibold text-sm"> <i class="fa-solid fa-caret-left"></i> Trở về</a>
            <h1 class="text-green-700 font-semibold text-lg mb-6 text-center">Đăng Ký Vé Xe Buýt</h1>
            <div class="mb-6 text-left">
                <label for="ticketType" class="block text-gray-700 font-medium mb-1">Loại Vé</label>
                <select id="ticketType" name="ticketType"
                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:outline-none">
                    <option value="Single_Line">Vé Đơn Tuyến</option>
                    <option value="inter_line">Vé Liên tuyến</option>
                    <option value="Full_line">Vé Toàn tuyến</option>
                </select>
            </div>

            <div class="mb-4 text-left">
                <label for="expiry" class="block text-gray-700 font-medium mb-1">Hạn Sử Dụng</label>
                <select id="expiry" name="expiry"
                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:outline-none">
                    <option value="one_month">1 Tháng</option>
                    <option value="three_month">3 Tháng</option>
                    <option value="six_month">6 Tháng</option>
                    <option value="twelve_month">12 Tháng</option>
                </select>
            </div>
            <div class="flex flex-col  ">
                <div class="mb-4 text-left">
                    <label for="singleLineSelect" class="block text-gray-700 font-medium mb-1">Đơn tuyến</label>
                    <select id="singleLineSelect" name="singleLineSelect"
                        class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:outline-none">
                        <option value="01">Tuyến 1: Bến xe Trung tâm ⇌ Bãi tắm Phạm Văn Đồng</option>
                        <option value="02">Tuyến 2: Bến xe Trung tâm ⇌ Bến xe Liên Chiểu</option>
                        <option value="03">Tuyến 3: Bến xe Trung tâm ⇌ Khu du lịch Bà Nà Hills</option>
                        <option value="04">Tuyến 04: Cầu Trần Thị Lý – Hoà Tiến</option>
                        <option value="05">Tuyến 05: Khu chung cư Hòa Hiệp Nam - Công viên Biển Đông</option>
                        <option value="06">Tuyến 06: Sân bay Đà Nẵng - Non Nước</option>
                        <option value="07">Tuyến 07: Xuân Diệu - Hoà Phước</option>
                        <option value="08">Tuyến 08: Vũng Thùng – Bến xe buýt Phạm Hùng</option>
                        <option value="10">Tuyến 10: Sân bay Đà Nẵng - Thọ Quang</option>
                        <option value="11">Tuyến 11: Xuân Diệu – Bệnh viện Phụ sản Nhi</option>
                        <option value="12">Tuyến 12: Xuân Diệu - Bến xe buýt Phạm Hùng</option>
                        <option value="15">Tuyến 15: Bến xe Trung tâm - Bến xe Phía nam</option>
                        <option value="16">Tuyến 16: Kim Liên – Đại học Việt Hàn</option>
                        <option value="17">Tuyến 17: Cảng sông Hàn – Hòa Khương</option>
                    </select>
                </div>
                <div class="mb-4 text-left">
                    <label for="interLineSelect" class="block text-gray-700 font-medium mb-1">Liên tuyến</label>
                    
                    <select id="interLineSelect" name="interLineSelect"
                        class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:outline-none">
                        <option value="LK01">Tuyến LK01 : Đà Nẵng Bến xe trung tâm - Huế Bến xe phía nam</option>
                        <option value="LK02">Tuyến LK02 : Đà Nẵng Đại học Việt Hàn - Hội An Cửa Đại</option>
                        <option value="LK21">Tuyến LK21 : Đà Nẵng Bến xe phía Nam  - Tam Kỳ </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="w-1/3 mx-auto block bg-green-600 text-white py-2 rounded-md font-medium hover:bg-green-700 transition">
                Đăng Ký
            </button>
        </form>
    </div>
@endsection
