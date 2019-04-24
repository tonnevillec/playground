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

        <div class="trumbowyg-dark">
        {!! form_row($form->content) !!}
        </div>

        {!! form_row($form->headerTag) !!}

        {!! form_row($form->tags) !!}

        {!! form_row($form->submit) !!}

        {!! form_end($form) !!}
    </div>
@endsection

@section('script')
    <script>
        var textarea = document.querySelector('.trumbowyg')

        $.trumbowyg.svgPath = '{{ asset('images/trumbowyg_icons.svg') }}'
        $('.trumbowyg').trumbowyg({
            lang: 'fr',
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen'],
                ['upload'],
                ['emoji'],
                ['table']
            ],
            plugins: {
                upload: {
                    serverPath: textarea.dataset.url,
                    fileFieldName: 'image',
                    urlPropertyName: 'url',
                    statusPropertyName: 'id',
                    data: [
                        {name: 'attachable_type', value: textarea.dataset.type},
                        {name: 'attachable_id', value: textarea.dataset.id},
                    ],
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            }
        });
    </script>
@endsection
