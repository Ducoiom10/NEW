@extends('client.layouts.master')

@section('content')

<!-- Hiển thị danh sách bài viết -->
@if($articles->count() > 0)
@foreach($articles as $article)
<div class="article-item">
    <h2><a href="{{ route('client.articles.show', $article->id) }}">{{ $article->title }}</a></h2>
    <p>{{ Str::limit($article->body, 150) }}</p>
</div>
@endforeach

<!-- Phân trang -->
{{ $articles->appends(['query' => request('query')])->links() }}
@else
<p>No articles found.</p>
@endif
@endsection
