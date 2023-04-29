@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h1>Title: {{ $post->title }}
                    @if ($post->category)
                        <span class="badge rounded-pill bg-warning">{{ $post->category->name }}</span>
                    @else
                        <span class="badge rounded-pill bg-warning">Nessuna categoria</span>
                    @endif
                </h1>
                <p>Slug: {{ $post->slug }}</p>
                <p>Categoria: </p>
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

    <div class="container pb-5">
        <p>Content: {{ $post->content }}</p>
    </div>

    <div class="container">
        <h2>Articoli correlati: </h2>
        @if ($post->category)
            @foreach ($post->category->posts as $related_post)
                <li>
                    <a href="{{ route('posts.show', $related_post) }}">
                        {{ $related_post->title }}
                    </a>
                </li>
            @endforeach
        @else
            <p>Nessun articolo correlato </p>
        @endif
    </div>
@endsection
