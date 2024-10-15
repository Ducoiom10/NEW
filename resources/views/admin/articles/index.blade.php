@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Quản Lý Bài Viết</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">Thêm Bài Viết</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Loại</th>
                <th>Người Đăng</th>
                <th>Views</th>
                <th>Ngày Xuất Bản</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>{{ $article->views }}</td>
                    <td>{{ $article->published_at ? $article->published_at->format('d/m/Y') : 'Chưa Xuất Bản' }}</td>
                    <td>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}
</div>
@endsection
