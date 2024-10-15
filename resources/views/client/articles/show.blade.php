@extends('client.layouts.master')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->body }}</p>
    <h3>Comments</h3>
    @if ($article->comments->isNotEmpty())
    @foreach ($article->comments as $comment)
        <div>
            <p>{{ $comment->comment }}</p>
            <p>By {{ $comment->user->name }}</p>
        </div>
    @endforeach
@else
    <p>Không có bình luận nào cho bài viết này.</p>
@endif


    @auth
        <form action="{{ route('articles.comments.store', $article) }}" method="POST">
            @csrf
            <textarea name="comment" required></textarea>
            <button type="submit">Post Comment</button>
        </form>
    @endauth

    @auth
        <form action="{{ route('articles.like', $article) }}" method="POST">
            @csrf
            <button type="submit">{{ $article->likes()->where('user_id', auth()->id())->exists() ? 'Unlike' : 'Like' }}</button>
        </form>
    @endauth
@endsection
