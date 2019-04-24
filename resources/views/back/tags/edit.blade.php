@extends('layouts.back')

@section('admin_content')
    <div class="card-header">
        TAGS
    </div>

    <div class="card-body">
        <h2 class="card-title">
            @if($form->getModel()->exists)
                Edition du tag
            @else
                Nouveau tag
            @endif
        </h2>

        {!! form_start($form) !!}

        <div class="row">
            <div class="col-8">
                {!! form_row($form->name) !!}
            </div>

            <div class="col">
                {!! form_row($form->icon) !!}
            </div>
        </div>

        {!! form_row($form->submit) !!}

        {!! form_end($form) !!}
    </div>
@endsection