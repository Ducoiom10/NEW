<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    // Hiển thị danh sách bình luận
    public function index()
    {
        $comments = Comment::query()->latest('id')->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    // Xóa bình luận
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->route('admin.comments.index');
    }
}