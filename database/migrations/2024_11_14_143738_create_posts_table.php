<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table){
            $table->id();
            $table->string('image_title')->default('default_image');
            $table->string('title');
            $table->text('content');
            $table->integer('view')->default(0);
            $table->enum('type', ['Công nghệ', 'Đời sống', 'Hoạt động']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
