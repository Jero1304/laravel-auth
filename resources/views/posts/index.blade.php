@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex align-items-center">
            <h1 class="me-auto py-3">Tutti i post</h1>


            <div>
                <a class="btn btn-primary" href="{{ route('posts.create') }}">Nuovo Post</a>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>category</th>
                    <th>Slug</th>
                    <th>Data creazione</th>
                    <th>Data Modifica</th>
                    <th>Eliminato</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </td>

                        <td>{{$post->category ? $post->category->name : '-'}}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>{{ $post->trashed() ? 'Eliminato il: ' . $post->deleted_at : '' }}</td>
                        <td>
                            <div class="d-flex">

                                <a class="btn btn-sm btn-secondary" href="{{ route('posts.edit', $post) }}">Edit</a>

                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-sn btn-danger" type="submit" value="Delete">
                                </form>

                                @if ($post->trashed())
                                    <form action="{{ route('posts.restore', $post) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-sn btn-success" type="submit" value="Ripristina">
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6">Nessun post trovato</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
