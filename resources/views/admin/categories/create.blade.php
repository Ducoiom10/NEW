@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>Thêm Chuyên Mục</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên Chuyên Mục</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Chuyên Mục</button>
    </form>
</div>
@endsection
