@extends('layouts.master')

@section('content')

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
                <a href="{{ route('blogIndex') }}">Back</a>
            </div>
        </div>
    </div>

@endsection
