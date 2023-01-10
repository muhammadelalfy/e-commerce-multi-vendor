


    <x-form.label >Product Name</x-form.label>
    <x-form.input :value="$product->name" class="form-control-lg" role="input" name="name" />

    <div class="form-group">
        <label for="">Category</label>
        <select type="text" name="category_id" value="" class="form-control">
            <option value="">{{ 'primary category'}}</option>
            @forelse( $categories as $category)
                @dd(old('category_id'))
                <option value="{{$category->id}}" @selected(old('category_id' , $product->category_id) == $category->id)>{{  $category->name }} </option>
{{--                @error('category_id')--}}
{{--                <div class="invalid-feedback">--}}
{{--                    {{$message}}--}}
{{--                </div>--}}
{{--                @enderror--}}
            @empty
                <option value="">No parents Found</option>
            @endforelse

        </select>
    </div>

        <div class="form-group">
          <x-form.textarea name="description" :value="$product->description" label="description" />
        </div>

        <div class="form-group">
            <x-form.label>Image</x-form.label>
            <input type="file" name="logo_image" >
                 @if ($product->logo_image)
                       <img src="{{ asset('storage/' . $product->logo_image) }}" style="width: 100px; height:100px">
                 @endif
        </div>

        <div class="form-group">
            <x-form.label>Price</x-form.label>
            <x-form.input name="price" :value="$product->price" />
        </div>


        <div class="form-group">
            <x-form.label>Compare Price</x-form.label>
            <x-form.input name="compare_price" :value="$product->compare_price" />
        </div>

         <div class="form-group">
                <x-form.label>Tags</x-form.label>
               <x-form.input name="tag" />
         </div>



        <div class="form-group">

            <x-form.label>Status</x-form.label>
           <x-form.radio  :name="$product->status" :checked="$product->status" :options="['active' => 'Active' , 'inactive' => 'Inactive' ]" />

              <button type="subbmit" class="btn btn-primary">Save</button>
        </div>
