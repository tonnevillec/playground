@extends('layouts.back')

@section('admin_content')
    <div class="card-header">
        UTILISATEURS
    </div>

    <div class="card-body">
        <h2 class="card-title">
            @if($form->getModel()->exists)
                Edition de l'utilisateur
            @endif
        </h2>

        {!! form_start($form) !!}

        <div class="row">
            <div class="col">
                {!! form_row($form->email) !!}
            </div>
            <div class="col-2">
                {!! form_row($form->admin) !!}
            </div>
        </div>

        {!! form_row($form->pseudo) !!}

        <div class="row">
            <div class="col">
                {!! form_row($form->firstname) !!}
            </div>

            <div class="col">
                {!! form_row($form->lastname) !!}
            </div>
        </div>

        <div class="row">
            <div class="col">
                {!! form_row($form->twitter) !!}
            </div>

            <div class="col">
                {!! form_row($form->website) !!}
            </div>
        </div>

        {!! form_row($form->submit) !!}

        {!! form_end($form) !!}
    </div>
@endsection