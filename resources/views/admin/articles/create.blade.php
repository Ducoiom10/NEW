@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>Thêm Bài Viết</h2>
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu Đề</label>
            <input type="text" class="form-control" id="title" name="title" >
        </div>
        <div class="mb-3">
            <label for="excerpt" class="form-label">Tóm Tắt</label>
            <textarea class="form-control" id="excerpt" name="excerpt" ></textarea>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Nội Dung</label>
            <textarea class="form-control" id="body" name="body" ></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="views" class="form-label">Views</label>
            <input type="number" class="form-control" id="views" name="views" value="0">
        </div>
        <div class="mb-3">
            <label for="published_at" class="form-label">Ngày Xuất Bản</label>
            <input type="date" class="form-control" id="published_at" name="published_at">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh Mục</label>
            <select class="form-control" id="category_id" name="category_id" >
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="is_featured" class="form-label">Nổi Bật</label>
            <input type="checkbox" id="is_featured" name="is_featured">
        </div>
        <button type="submit" class="btn btn-primary">Thêm Bài Viết</button>
    </form>
</div>
@endsection
