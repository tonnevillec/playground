@if ($showLabel && $showField && $options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!}>
        @endif

        @if ($showLabel && $options['label'] !== false && $options['label_show'])
            {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
        @endif

        @if ($showField)
            @if ($options['value'] !== '' && $options['value'] !== null)
                <div class="text-center mb-2">
                    <img src="{{ isset($options['prefix']) ? url($options['prefix'].'/'.$options['value']) : url($options['value']) }}" id="destImg" class="img-thumbnail">
                </div>
            @endif

            <div class="input-group mb-2">
                {!! Form::input('file', $name, $options['value'], $options['attr']) !!}
                <input type="hidden" name="initValue" id="initValue" value="{{ $options['value'] }}">
            </div>

            @include('vendor.laravel-form-builder.help_block')
        @endif

        @include('vendor.laravel-form-builder.errors')

        @if($showLabel && $showField && $options['wrapper'] !== false)
    </div>
@endif