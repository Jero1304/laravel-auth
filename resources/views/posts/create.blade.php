@extends('layouts.app')

@section('content')
    {{-- <div class=""></div> --}}
    <div class="container py-4">
        <h1>Nuovo Post</h1>
    </div>

    <div class="container py-5">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" id="title" aria-describedby="titleHelp">
                {{-- errore title --}}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}"
                    id="content" style="height:200px"></textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria</label>
                <select class="form-select" @error('category_id') is_invalid @enderror id="category_id" name="category_id" aria-label="Default select example">
                    <option value="" selected>seleziona categoria</option>
                    @foreach($categories as $category)
                    <option @selected(old('category_id')== $category->id) value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
                {{-- errore title --}}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
