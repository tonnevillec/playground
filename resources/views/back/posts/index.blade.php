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

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

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
                            <div class="btn-group btn-group-sm" role="group" aria-label="Boutons action">
                                <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
    {{--                            {!! Form::open(['method' => 'Delete', 'route' => ['posts.destroy', $post->id]]) !!}--}}
    {{--                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>--}}
    {{--                            {!! Form::close() !!}--}}
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirm" data-url="{{ route('posts.destroy', ['id' => $post->id]) }}" data-whatever="{{ '#' . $post->id . ' - ' . $post->title }}"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="deleteConfirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmLabel">Voulez-vous vraiment supprimer le post suivant ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="modal-body font-weight-bold"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                    <form method="POST" action="#" id="formDeleteConfirm">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ @csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#deleteConfirm').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var url = button.data('url')
            var recipient = button.data('whatever')
            var modal = $(this)

            modal.find('.modal-body').text(recipient)
            $('#formDeleteConfirm').prop('action', url)
        });
    </script>
@endsection