@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>Sửa Chuyên Mục</h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên Chuyên Mục</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật Chuyên Mục</button>
    </form>
</div>
@endsection
