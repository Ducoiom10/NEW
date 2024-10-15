@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>Sửa Bài Viết</h2>
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu Đề</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
        </div>
        <div class="mb-3">
            <label for="excerpt" class="form-label">Tóm Tắt</label>
            <textarea class="form-control" id="excerpt" name="excerpt">{{ $article->excerpt }}</textarea>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Nội Dung</label>
            <textarea class="form-control" id="body" name="body" required>{{ $article->body }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($article->image)
                <p>Ảnh hiện tại: <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" style="max-width: 100px;"></p>
            @endif
        </div>
        <div class="mb-3">
            <label for="views" class="form-label">Views</label>
            <input type="number" class="form-control" id="views" name="views" value="{{ $article->views }}">
        </div>
        <div class="mb-3">
            <label for="published_at" class="form-label">Ngày Xuất Bản</label>
            <input type="date" class="form-control" id="published_at" name="published_at" value="{{ $article->published_at ? $article->published_at->format('Y-m-d') : '' }}">
        </div>
        <div class="mb-3">
            <label for="is_featured" class="form-label">Nổi Bật</label>
            <input type="checkbox" id="is_featured" name="is_featured" {{ $article->is_featured ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật Bài Viết</button>
    </form>
</div>
@endsection
