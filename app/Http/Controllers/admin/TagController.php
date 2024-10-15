<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Hiển thị danh sách thẻ tag
    public function index()
    {
        $tags = Tag::query()->latest('id')->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    // Hiển thị trang tạo thẻ tag mới
    public function create()
    {
        return view('admin.tags.create');
    }

    // Xử lý lưu thẻ tag mới
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        Tag::create($request->only('name'));
        return redirect()->route('tags.index');
    }

    // Hiển thị trang chỉnh sửa thẻ tag
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
    }

    // Xử lý cập nhật thẻ tag
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $tag = Tag::findOrFail($id);
        $tag->update($request->only('name'));

        return redirect()->route('tags.index');
    }

    // Xóa thẻ tag
    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('tags.index');
    }
}