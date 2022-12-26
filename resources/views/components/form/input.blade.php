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
        name="{{$name}}"  class="form-control"
        value="{{old('name' , $value)}}"
        class="{{$class}}"
        class="{{$placeholder}}"
    {{$attributes->class([
        'form-control' ,
        'is-invalid' => $errors->has($name)
    ]) }}
    >
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror

{{--</div>--}}
