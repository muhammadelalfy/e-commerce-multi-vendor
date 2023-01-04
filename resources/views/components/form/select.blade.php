
@props([
    'name' , 'options' , 'selected' => false
])


        <select type="text" name="{{$name}}" value="" class="form-control"


            {{  $attributes->class([
                  'form-control' ,
                  'is-invalid' => $errors->has($name)
          ]) }}
        >
            <option value="">{{ 'primary ' . $name}}</option>
            @forelse ($options as $value => $text)
                <option value="{{$text}}">{{  old($name , $value)}} @selected($name == $value))</option>

        </select>

        <label class="form-check-label" for="exampleRadios1">
            {{$text}}
        </label>
@empty
    <option value="">No {{'No' . $name . '\'s'}} Found</option>
@endforelse
