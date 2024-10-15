<?php

namespace App\Http\Controllers\Client;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    // Hiển thị danh sách bài viết và xử lý tìm kiếm
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm nếu có
        $keyword = $request->input('query');

        // Kiểm tra có từ khóa tìm kiếm hay không
        $articles = Article::when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'LIKE', "%$keyword%")
                  ->orWhere('body', 'LIKE', "%$keyword%");
        })
        ->paginate(10); // Phân trang với 10 bài viết mỗi trang

        // Kiểm tra xem có từ khóa tìm kiếm hay không để thay đổi tiêu đề
        $pageTitle = $keyword ? 'Tìm kiếm: ' . $keyword : 'Danh sách bài viết';

        // Trả về view kèm kết quả
        return view('client.articles.index', compact('articles', 'keyword', 'pageTitle'))
               ->with('message', $articles->isEmpty() ? 'Không tìm thấy kết quả nào.' : '');
    }

    // Hiển thị chi tiết bài viết
    public function show($id)
    {
        // Lấy bài viết và các bình luận kèm người dùng liên quan
        $article = Article::with('comments.user')->findOrFail($id);

        // Kiểm tra quyền truy cập bài viết nếu cần (ví dụ bài viết riêng tư)
        if ($article->is_private && !auth()->check()) {
            abort(403, 'Bạn không có quyền truy cập bài viết này.');
        }
        // Tăng lượt xem cho bài viết
        $article->increment('views');
        // Lấy bài viết và các bình luận kèm người dùng liên quan
        $article = Article::with('comments.user')->findOrFail($id);
        $pageTitle = $article->title;

        // Trả về view chi tiết bài viết
        return view('client.articles.show', compact('article','pageTitle'));
    }
}