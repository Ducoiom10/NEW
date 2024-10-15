@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>Thêm Tag</h2>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Tag</button>
    </form>
</div>
@endsection
