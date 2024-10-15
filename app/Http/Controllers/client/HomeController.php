<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Hiển thị trang chủ với tin nổi bật, mới nhất và phổ biến
    public function index()
    {
        $latestArticles = Article::latest()->take(6)->get(); // Lấy 5 bài viết mới nhất
        $popularArticles = Article::orderBy('views', 'desc')->take(6)->get(); // Lấy 5 bài viết phổ biến

        $pageTitle = 'Trang Chủ'; // Đặt tiêu đề trang

        return view('client.home', compact( 'latestArticles', 'popularArticles', 'pageTitle'));
}

    // Hiển thị chi tiết bài viết
    public function show($id)
    {

        try {
            $article = Article::findOrFail($id); // Tìm bài viết theo ID
            $article->increment('views'); // Tăng số lượt xem lên 1
            return view('client.article.show', compact('article')); // Trả về view chi tiết bài viết
        } catch (\Exception $e) {
            return redirect()->route('client.home')->with('error', 'Bài viết không tồn tại'); // Xử lý lỗi nếu bài viết không tồn tại
        }

    }

    // Hiển thị bài viết theo chuyên mục
    public function category($id)
    {
        $category = Category::findOrFail($id); // Tìm chuyên mục theo ID
        $articles = $category->articles()->paginate(10); // Lấy bài viết thuộc chuyên mục và phân trang
        return view('client.category', compact('category', 'articles')); // Trả về view danh sách bài viết theo chuyên mục
    }

    // Tìm kiếm bài viết
    public function search(Request $request)
    {
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm
        // Tìm bài viết theo tiêu đề hoặc nội dung
        $articles = Article::where('title', 'LIKE', "%{$query}%")
                            ->orWhere('body', 'LIKE', "%{$query}%")
                            ->paginate(10); // Phân trang kết quả tìm kiếm
        return view('client.search', compact('articles', 'query')); // Trả về view kết quả tìm kiếm
    }
}