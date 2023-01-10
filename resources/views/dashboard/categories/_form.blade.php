
    <x-form.input label="Category Name" class="form-control-lg" role="input" name="name" />
        <div class="form-group">

            <label for="">Parent</label>
            <select type="text" name="parent_id" value="" class="form-control">
                <option value="">{{ 'primary category'}}</option>
                @forelse ($parents as $parent)
                <option value="{{$parent->id}}">{{  old('parent_id' , $parent->name)}} @selected(old('parent_id' , $category->id))</option>
                    @error('parent_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                @empty
                <option value="">No parents Found</option>
                @endforelse

            </select>
        </div>

        <div class="form-group">
          <x-form.textarea name="description" :value="$category->descriptopn" label="description" />
        </div>

        <div class="form-group">
            <x-form.label>Image</x-form.label>
            <input type="file" name="logo_image" >
                 @if ($category->logo_image)
                       <img src="{{ asset('storage/' . $category->logo_image) }}" style="width: 100px; height:100px">
                 @endif
        </div>

        <div class="form-group">

            <x-form.label>Status</x-form.label>
           <x-form.radio  :name="$category->status" :checked="$category->status" :options="['active' => 'Active' , 'inactive' => 'Inactive' ]" />

              <button type="submit" class="btn btn-primary">Save</button>
        </div>
