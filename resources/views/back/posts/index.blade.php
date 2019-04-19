@extends('layouts.back')

@section('admin_content')
    <div class="card-header">
        ARTICLES
    </div>

    <div class="card-body">
        <h2 class="card-title mb-2 border-bottom">
            Liste des articles
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Nouvel article</a>
        </h2>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Créé le</th>
                    <th scope="col">Maj le</th>
                    <th scope="col">Publié</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author->pseudo }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>{{ $post->publie ? 'oui' : 'non' }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Action button">
                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                            {!! Form::open(['method' => 'Delete', 'route' => ['posts.destroy', $post->id]]) !!}
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection