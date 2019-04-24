@extends('layouts.common')

@section('content')
    <div class="container mt-3" id="app">
        <div class="row justify-content-center">
            <div class="col">
                <div class="list-group">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-home"></i> Retour au site
                    </a>

                    <a href="{{ route('admin') }}"
                       class="list-group-item list-group-item-action @if(!isset($entity)) list-group-item-primary @endif">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>

                    <a href="{{ route('tags.index') }}"
                       class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'tags') list-group-item-primary @endif">
                        <i class="far fa-arrow-alt-circle-right"></i> Tags
                    </a>

                    <a href="{{ route('posts.index') }}"
                       class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'posts') list-group-item-primary @endif">
                        <i class="far fa-arrow-alt-circle-right"></i> Articles
                    </a>
                </div>

                <div class="list-group mt-2">
                    <div class="list-group-item bg-danger"><i class="fa fa-cogs"></i> Administration</div>
                    <a href="{{ route('users.index') }}"
                       class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'users') list-group-item-primary @endif">
                        <i class="fas fa-users-cog"></i> Utilisateurs
                    </a>
                </div>
            </div>

            <div class="col-9">
                <div class="card">
                    @yield('admin_content')
                </div>
            </div>
        </div>
    </div>
@endsection