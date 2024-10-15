@extends('client.layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Thông tin người dùng</h1>

    @foreach($profiles as $profile)
    <div class="row mb-4">
        <div class="col-md-4">
            <img src="{{ asset($profile->avatar) }}" alt="Avatar" class="img-fluid rounded-circle"
                style="width: 200px; height: 200px;">
        </div>
        <div class="col-md-8">
            <h3>{{ $profile->user->name }}</h3> <!-- Lấy tên người dùng từ mối quan hệ -->
            <p><strong>Địa chỉ:</strong> {{ $profile->address }}</p>
            <p><strong>Số điện thoại:</strong> {{ $profile->phone_number }}</p>
            <p><strong>Mô tả:</strong> {{ $profile->bio }}</p>
        </div>
    </div>
    @endforeach

</div>
@endsection
