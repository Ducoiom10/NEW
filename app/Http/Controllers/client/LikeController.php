<?php

namespace App\Http\Controllers\Client;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    // Lưu lượt thích mới
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'article_id' => 'required|exists:articles,id',
        ]);

        Like::create($validatedData);
        return redirect()->back()->with('success', 'Bạn đã thích bài viết này!');
    }

    // Xóa lượt thích
    public function destroy($id)
    {
        $like = Like::findOrFail($id);
        $like->delete();
        return redirect()->back()->with('success', 'Bạn đã bỏ thích bài viết này!');
    }
}