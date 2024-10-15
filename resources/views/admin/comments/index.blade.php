@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h1>Danh sách bình luận</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nội dung</th>
                <th>Người dùng</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $comments -> links() }}
</div>
@endsection
