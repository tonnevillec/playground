@extends('layouts.back')

@section('admin_content')
    <div class="card-header">
        TAGS
    </div>

    <div class="card-body">
        <h2 class="card-title mb-2 border-bottom">
            Liste des tags
            <a href="{{ route('tags.create') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Nouveau tag</a>
        </h2>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td><img src="{{ url('images/tags/'.$tag->icon) }}" alt="{{ $tag->name }}" class="img-to-icon"></td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Action button">
                                <a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection