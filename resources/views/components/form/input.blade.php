@props([
    'type'=> 'text',
    'name',
    'value' => '',
    'label' => false,
    'class' => '',
    'placeholder' => '',
])

    @if($label)
        <label for="">{{$label}}</label>
    @endif

{{--<div class="form-control">--}}
    <input
        type="{{$type}}"
        name="{{$name}}"
        value="{{old('name' , $value)}}"

    {{$attributes->class([
        'form-control' ,
        'is-invalid' => $errors->has($name)
    ]) }}
    >

    @error($name)
        {{$message}}
    @enderror

{{--</div>--}}
