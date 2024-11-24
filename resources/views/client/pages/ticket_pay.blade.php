@extends('client.layouts.page')

@section('title', 'Thanh toán')

@section('sass')

@endsection

@section('js')
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');

    form.addEventListener("submit", function (event) {
        let selected = false;

        paymentMethods.forEach(method => {
            if (method.checked) {
                selected = true;
            }
        });

        if (!selected) {
            event.preventDefault();
            alert("Vui lòng chọn một phương thức thanh toán trước khi tiếp tục!");
        }
    });
});

    </script>
@endsection

@section('content')
    <div class="bg-white w-full rounded-xl shadow-xl p-6 space-y-4">
        <a href="{{ route('ticket.registration') }}" class="text-left text-blue-500 font-semibold text-sm"> <i class="fa-solid fa-caret-left"></i> Trở về</a>
        <div>
            <h3 class="text-green-700 font-semibold">Thông tin tài khoản:</h3>
            <div class="flex flex-col justify-center items-center ">
                <img src="{{ asset(Auth::user()->avatar ? 'storage/' . Auth::user()->avatar : 'image/icon_image/avatar.jpg') }}"
                    alt="{{ Auth::user()->name }}"
                    class="size-40 rounded-full object-cover">
                    <div class="overflow-x-auto p-4 bg-gray-100 rounded-lg shadow">
                        <table class="w-full table-fixed border border-gray-300 bg-white rounded-lg break-words">
                            <tbody>
                                <tr class="bg-gray-200">
                                    <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Họ và tên:</td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ Auth::user()->name }}</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Ngày sinh:</td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('d/m/Y') }}</td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Giới tính:</td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ Auth::user()->gender }}</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Email:</td>
                                    <td class="border border-gray-300 px-4 py-2 text-gray-600 break-words">{{ Auth::user()->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
            </div>
            <div>

            </div>
        </div>
        <div>
            <h3 class="text-green-700 font-semibold">Thông tin vé đăng kí:</h3>
            <div class="overflow-x-auto p-4 bg-gray-100 rounded-lg shadow">
                <table class="w-full table-fixed border border-gray-300 bg-white rounded-lg">
                    <tbody>
                        <tr class="bg-gray-200">
                            <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Loại vé:</td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-600">
                                @if ($ticketType === 'Single_Line') Vé Đơn Tuyến
                                @elseif ($ticketType === 'inter_line') Vé Liên Tuyến
                                @elseif ($ticketType === 'Full_line') Vé Toàn Tuyến
                                @endif
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Hạn sử dụng:</td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-600">
                                @if ($expiry === 'one_month') 1 Tháng
                                @elseif ($expiry === 'three_month') 3 Tháng
                                @elseif ($expiry === 'six_month') 6 Tháng
                                @elseif ($expiry === 'twelve_month') 12 Tháng
                                @endif
                            </td>
                        </tr>
                        @if ($route)
                            <tr class="bg-gray-200">
                                <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Tuyến:</td>
                                <td class="border border-gray-300 px-4 py-2 text-gray-600">
                                    {{ $route }}
                                </td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Ngày hết hạn:</td>
                                <td class="border border-gray-300 px-4 py-2 text-gray-600 break-words">
                                    {{ $expiryDate}}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-right text-lg font-semibold">
            <span>Tổng tiền:</span> <span class="text-green-700">{{ $ticketPrice }}</span>
        </div>
        <div>
            <h3 class="text-green-700 font-semibold">Phương thức thanh toán:</h3>
            <div class="bg-white w-full rounded-xl shadow-xl p-6 space-y-4">
                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <div class="flex flex-col laptop:flex-row gap-6">
                        <div class="flex items-center">
                            <input type="radio" id="momo" name="payment_method" value="momo" class="text-green-500 focus:ring-green-500" />
                            <label for="momo" class="ml-2 text-gray-700">Thanh toán qua MoMo</label>
                        </div>
                        <!-- VNPay Payment -->
                        <div class="flex items-center">
                            <input type="radio" id="vnpay" name="payment_method" value="vnpay" class="text-green-500 focus:ring-green-500" />
                            <label for="vnpay" class="ml-2 text-gray-700">Thanh toán qua VNPay</label>
                        </div>
                        <!-- Cash on Delivery -->
                        <div class="flex items-center">
                            <input type="radio" id="cash" name="payment_method" value="cash" class="text-green-500 focus:ring-green-500" />
                            <label for="cash" class="ml-2 text-gray-700">Thanh toán trực tiếp (COD)</label>
                        </div>
                    </div>
                    <input type="hidden" name="ticket_type" value="{{ $ticketType }}" />
                    <input type="hidden" name="ticket_price" value="{{ $ticketPrice }}" />
                    <input type="hidden" name="route" value="{{ $route }}" />
                    <input type="hidden" name="expiry" value="{{ $expiry }}" />
                    <input type="hidden" name="expiryDate" value="{{ $expiryDate }}" />
                    <button type="submit" class="w-1/3 block mx-auto mt-6 bg-green-600 text-white py-2 rounded-md font-medium hover:bg-green-700 transition">Thanh Toán</button>
                </form>
            </div>
        </div>
    </div>
@endsection