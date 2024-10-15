@extends('client.layouts.master')

@section('tieudetrang', 'Trang chủ')

@section('content')
<div class="container">
    <h1>Tin Mới Nhất</h1>
    <div class="row">
        @foreach($latestArticles as $article)
        <div class="col-md-4">
            <div class="card">
                <img src="public/client/images/topics/{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <a href="{{ route('client.articles.show', $article->id) }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h1>Tin Phổ Biến</h1>
    <div class="row">
        @foreach($popularArticles as $article)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
