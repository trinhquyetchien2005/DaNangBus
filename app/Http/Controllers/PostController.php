<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Request $request)
{
    $search = $request->input('search');
    $sort = $request->input('sort', 'newest'); 
    $type = $request->input('type');

    $query = Post::query();

    if ($search) {
        $query->where('title', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%");
    }

    if ($type) {
        $query->where('type', $type);
    }

    switch ($sort) {
        case 'oldest':
            $posts = $query->orderBy('type') 
                            ->orderBy('created_at', 'asc')
                            ->paginate(20);
            break;
        case 'popular':
            $posts = $query->orderBy('type') 
                            ->orderBy('view', 'desc')
                            ->paginate(20);
            break;
        case 'newest':
        default:
            $posts = $query->orderBy('type')
                            ->orderBy('created_at', 'desc')
                            ->paginate(20);
            break;
    }
    $types = Post::select('type')->distinct()->get();

    return view('client.pages.post', compact('posts', 'types'));
}

    

    public function getPost($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->increment('view');
        
        // Lấy trang hiện tại từ tham số 'page' để giữ lại khi quay lại
        $currentPage = $request->input('page', 1);
        
        return view('client.pages.post_detail', compact('post', 'currentPage'));
    }
}
