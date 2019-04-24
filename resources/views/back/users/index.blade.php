@extends('layouts.back')

@section('admin_content')
    <div class="card-header">
        UTILISATEURS
    </div>

    <div class="card-body">
        <h2 class="card-title mb-2 border-bottom">
            Liste des utilisateurs
        </h2>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Inscrit le</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->pseudo }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Boutons action">
                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
{{--                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirm" data-url="{{ route('posts.destroy', ['id' => $post->id]) }}" data-whatever="{{ '#' . $post->id . ' - ' . $post->title }}"><i class="fas fa-trash"></i></button>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection