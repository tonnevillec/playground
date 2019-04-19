@extends('layouts.back')

@section('admin_content')
    <div class="card-header">
        ARTICLES
    </div>

    <div class="card-body">
        <h2 class="card-title">
            @if($form->getModel()->exists)
                Edition de l'article
            @else
                Nouvel article
            @endif
        </h2>

        {!! form_start($form) !!}

        {!! form_row($form->publie) !!}

        {!! form_row($form->title) !!}

        {!! form_row($form->content) !!}

        {!! form_row($form->tags) !!}

        {!! form_row($form->submit) !!}

        {!! form_end($form) !!}
    </div>
@endsection