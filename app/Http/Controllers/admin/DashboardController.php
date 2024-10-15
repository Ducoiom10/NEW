<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Thống kê tổng số bài viết
        $totalArticles = Article::count();

        // Thống kê tổng số danh mục
        $totalCategories = Category::count();

        // Thống kê tổng lượt xem
        $totalViews = Article::sum('views');

        // Thống kê số bài viết đang chờ duyệt (ví dụ: is_featured = 0)
        $pendingArticles = Article::where('is_featured', 0)->count();

        //Thống kê số lượng người dùng
        $totalUsers = User::count();

        return view('admin.dashboard', compact('user', 'totalArticles', 'totalCategories', 'totalViews', 'pendingArticles','totalUsers'));
    }
}