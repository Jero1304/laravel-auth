@extends('layouts.app')

@section('content')
    {{-- <div class=""></div> --}}
    <div class="container py-4">
        <h1>Modifica: {{ $post->title }}</h1>
    </div>

    <div class="container py-5">
        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $post->title) }}" id="title" aria-describedby="titleHelp">
                {{-- errore title --}}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content"
                    style="height:200px">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
