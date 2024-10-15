<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // Hiển thị danh sách danh mục cho client
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('client.categories.index', compact('categories'));
    }

    // Hiển thị chi tiết danh mục (nếu cần)
    public function show($id)
    {
        $category = Category::findOrFail($id);
        // Bạn có thể lấy thêm các sản phẩm liên quan đến danh mục này nếu cần
        return view('client.categories.show', compact('category'));
    }
}