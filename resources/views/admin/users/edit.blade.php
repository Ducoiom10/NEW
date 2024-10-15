@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h1>Chỉnh sửa tài khoản: {{ $user->name }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" >
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" >
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu (để trống nếu không thay đổi):</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Số Điện Thoại:</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar" class="form-control">
        </div>

        <div class="form-group">
            <label for="date_of_birth">Ngày Sinh:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->date_of_birth) }}">
        </div>

        <div class="form-group">
            <label for="address">Địa Chỉ:</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $user->address) }}">
        </div>

        <div class="form-group">
            <label for="role">Chức Vụ:</label>
            <select class="form-control" id="role" name="role" >
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Quản Trị Viên</option>
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Người Dùng</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
