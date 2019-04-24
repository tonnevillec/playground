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