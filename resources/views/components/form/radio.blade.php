
@props([
    'name' , 'options' , 'checked' => false
])
@foreach($options as $value => $text)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{$name}}" id="exampleRadios1" value="{{$value}}" @checked($name== $value)
          {{  $attributes->class([
                'form-checked-input' ,
                'is-invalid' => $errors->has($name)
        ]) }}
        >
        <label class="form-check-label" for="exampleRadios1">
            {{$text}}
        </label>
    </div>
@endforeach
