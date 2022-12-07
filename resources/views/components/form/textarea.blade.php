@props([
    'name',
    'value' => '',
    'label' => false
])

    @if($label)
        <label for="">{{$label}}</label>
    @endif

<div class="form-group">
    <label for="">Name</label>
    <textarea
        name="{{$name}}"  class="form-control"
    {{$attributes->class([
        'form-control' ,
        'is-invalid' => $errors->has($name)
    ]) }}
    >{{old('description' , $value)}}</textarea>
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror

</div>
