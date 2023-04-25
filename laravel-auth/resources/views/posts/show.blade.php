@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h1>Title: {{ $post->title }}</h1>
                <p>Slug: {{ $post->slug }}</p>
            </div>
            <div class="d-flex">
                <a class="btn btn-sm btn-warning" href="{{ route('posts.edit', $post) }}">Edit</a>
                @if ($post->trashed())
                    <form action="{{ route('posts.restore', $post) }}" method="POST">
                        @csrf
                        <input class="btn btn-sn btn-success" type="submit" value="Ripristina">
                    </form>
                @endif
            </div>
        </div>

    </div>

    <div class="container">
        <p>Content: {{ $post->content }}</p>
    </div>
@endsection
