
@props([
    'name' , 'options' , 'selected' => false
])
        <select type="text" name="{{$name}}" class="form-control"

            {{  $attributes->class([
                  'form-control' ,
                  'is-invalid' => $errors->has($name)
          ]) }}
         >
            <option value="">{{ 'primary ' . $name}}</option>
            @forelse ($options as $value => $text)
                <option value="{{$value}}" @selected(old("$name" , "$value") == $value)> {{ $value}}  </option>
                    @empty
                         <option value="">No {{'No' . $name . '\'s'}} Found</option>
            @endforelse
        </select>

    @error($name)
        {{$message}}
    @enderror
