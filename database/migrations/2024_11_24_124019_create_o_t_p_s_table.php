<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->unique();  // Số điện thoại
            $table->string('otp_code');         // Mã OTP
            $table->boolean('is_verified')->default(false); // Trạng thái
            $table->timestamp('expires_at');    // Thời gian hết hạn
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};
