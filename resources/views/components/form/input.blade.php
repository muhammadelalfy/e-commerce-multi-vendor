@props([
    'type'=> 'text',
    'name',
    'value' => '',
    'label' => false
])

    @if($label)
        <label for="">{{$label}}</label>
    @endif

<div class="form-group">
    <label for="">Name</label>
    <input
        type="{{$type}}"
        name="{{$name}}"  class="form-control"
        value="{{old('name' , $value)}}"
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

</div>
