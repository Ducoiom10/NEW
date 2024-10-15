<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Hiển thị danh sách chuyên mục
    public function index()
    {
        $categories = Category::query()->latest('id')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    // Hiển thị trang tạo chuyên mục mới
    public function create()
    {
        return view('admin.categories.create');
    }

    // Xử lý lưu chuyên mục mới
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        Category::create($request->only('name'));
        return redirect()->route('admin.categories.index');
    }

    // Hiển thị trang chỉnh sửa chuyên mục
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Xử lý cập nhật chuyên mục
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $category = Category::findOrFail($id);
        $category->update($request->only('name'));

        return redirect()->route('admin.categories.index');
    }

    // Xóa chuyên mục
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories.index');
    }
}