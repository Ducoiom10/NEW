<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Đảm bảo bạn import Auth
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        $articles = Article::query()->latest('id')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    // Hiển thị trang tạo bài viết mới
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    // Xử lý lưu bài viết mới
    public function store(Request $request)
    {
        // Hiển thị dữ liệu gửi lên để kiểm tra
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048', // Kiểm tra ảnh (nếu có)
            'views' => 'nullable|integer|min:0',
            'published_at' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        // Lấy tất cả dữ liệu gửi lên
        $data = $request->all();
        $data['user_id'] = Auth::id(); // Lấy user_id từ auth

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Lưu ảnh vào thư mục public/images
            $data['image'] = $imagePath;
        } else {
            $data['image'] = null; // Nếu không có ảnh, thiết lập thành null
        }

        // Tạo mới bài viết
        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Bài viết đã được thêm thành công.');
    }


    // Hiển thị trang chỉnh sửa bài viết
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    // Xử lý cập nhật bài viết
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug,' . $id,
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'views' => 'nullable|integer|min:0',
            'published_at' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        $article = Article::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    // Xóa bài viết
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Xóa ảnh cũ nếu có
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        Article::destroy($id);
        return redirect()->route('admin.articles.index')->with('success', 'Bài viết đã được xóa thành công.');
    }
}