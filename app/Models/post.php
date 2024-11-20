<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['image_title', 'title', 'content', 'view', 'type'];

    public function show($id)
{
    $post = Post::findOrFail($id);
    $post->increment('view'); 
    return view('posts.show', compact('post'));
}

    public function scopeOfType($query, $type){
        return $query->where('type', $type);
    }
    public function scopePopular($query){
        return $query->orderBy('view', 'desc');
    }

    public static function getLatestPosts($limit = 10)
{
    return self::orderBy('created_at', 'desc')->take($limit)->get();
}
}
