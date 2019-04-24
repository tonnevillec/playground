@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        <div {!!  $options['wrapperAttrs'] !!} >
    @endif
@endif

@if ($showField)


    @if ($showLabel && $options['label'] !== false && $options['label_show'])
        {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
    @endif

    <label class="switch">
{{--        <input type="checkbox" class="success">--}}
        {!! Form::checkbox($name, $options['value'], $options['checked'], $options['attr']) !!}
        <span class="slider round"></span>
    </label>

    @include('vendor.laravel-form-builder.help_block')
@endif

@include('vendor.laravel-form-builder.errors')

@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        </div>
    @endif
@endif
