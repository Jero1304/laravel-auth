@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h1>Title: {{ $post->title }}</h1>
                <p>Slug: {{ $post->slug }}</p>
            </div>
            <div>
                <a class="btn btn-sm btn-warning" href="{{ route('posts.edit', $post) }}">Edit</a>
            </div>
        </div>

    </div>

    <div class="container">
        <p>Content: {{ $post->content }}</p>
    </div>
@endsection
