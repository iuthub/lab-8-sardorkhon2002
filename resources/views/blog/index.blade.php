@extends('layouts.master')

@section('content')

    @foreach($posts as $post)
        <div class="article">
            <div class="article-header">
                <h2>{{ $post['title'] }}</h2>
            </div>
            <div class="article-body">
                {{ $post['body'] }}
            </div>
            <div class="article-footer">
                <div class="article-meta">
                    Edit: date
                </div>
                <div class="article-actions">
                    <a class="linking" href="{{ route('blogPost', ['id'=> array_search($post, $posts)]) }}">More...</a>
                </div>
            </div>
        </div>
    @endforeach

@endsection
