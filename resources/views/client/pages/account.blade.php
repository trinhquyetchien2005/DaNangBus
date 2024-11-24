<!-- resources/views/client/account.blade.php -->

@extends('client.layouts.page')

@section('title', 'Tài khoản')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h2 class="text-3xl font-semibold mb-6">Cập nhật thông tin tài khoản</h2>

        @if(session('success'))
            <div class="alert alert-success mb-4 p-4 bg-green-500 text-white rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Bảng thông tin tài khoản -->
            <table class="min-w-full table-auto">
                <tbody>
                    <!-- Họ và tên -->
                    <tr>
                        <td class="px-4 py-2 text-left font-medium">Họ và tên</td>
                        <td class="px-4 py-2">
                            <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('name', $customer->name) }}" required>
                            @error('name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <!-- Ngày sinh -->
                    <tr>
                        <td class="px-4 py-2 text-left font-medium">Ngày sinh</td>
                        <td class="px-4 py-2">
                            <input type="date" name="date_of_birth" id="date_of_birth" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('date_of_birth', $customer->date_of_birth) }}">
                            @error('date_of_birth')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <!-- Giới tính -->
                    <tr>
                        <td class="px-4 py-2 text-left font-medium">Giới tính</td>
                        <td class="px-4 py-2">
                            <select name="gender" id="gender" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                                <option value="male" {{ old('gender', $customer->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                                <option value="female" {{ old('gender', $customer->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
                                <option value="other" {{ old('gender', $customer->gender) == 'other' ? 'selected' : '' }}>Khác</option>
                            </select>
                            @error('gender')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <!-- Số điện thoại -->
                    <tr>
                        <td class="px-4 py-2 text-left font-medium">Số điện thoại</td>
                        <td class="px-4 py-2">
                            <input type="text" name="phone_number" id="phone_number" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('phone_number', $customer->phone_number) }}">
                            @error('phone_number')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <!-- Trạng thái hoạt động -->
                    <tr>
                        <td class="px-4 py-2 text-left font-medium">Trạng thái hoạt động</td>
                        <td class="px-4 py-2">
                            <select name="is_active" id="is_active" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                                <option value="1" {{ old('is_active', $customer->is_active) == 1 ? 'selected' : '' }}>Đang hoạt động</option>
                                <option value="0" {{ old('is_active', $customer->is_active) == 0 ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                            @error('is_active')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <!-- Avatar -->
                    <tr>
                        <td class="px-4 py-2 text-left font-medium">Avatar</td>
                        <td class="px-4 py-2">
                            @if ($customer->avatar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/avatars/' . $customer->avatar) }}" alt="Avatar" class="w-24 h-24 rounded-full">
                                </div>
                            @endif
                            <input type="file" name="avatar" id="avatar" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                            @error('avatar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md">Cập nhật</button>
                <a href="{{ url('/') }}" class="px-6 py-2 mx-4 bg-gray-300 text-black rounded-md hover:bg-gray-400 transition duration-300">
                    Quay lại
                </a>
            </div>
            
        </form>
    </div>
@endsection
