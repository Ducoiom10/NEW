@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>Sửa Tag</h2>
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật Tag</button>
    </form>
</div>
@endsection
