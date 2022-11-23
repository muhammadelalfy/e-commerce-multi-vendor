<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name"  class="form-control" value="{{ old('name' , $category->name) }}">
    @error('name')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror

</div>

<div class="form-group">

    <label for="">Parent</label>
    <select type="text" name="parent_id" value="" class="form-control">
        <option value="">{{ 'primary category'}}</option>
        @forelse ($parents as $parent)
        <option value="">{{  old('parent_id' , $parent->name)}} @selected($category->id  == $parent->id)</option>
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


    <label for="">description</label>
    <textarea name="description" id="" class="form-control">{{ old('description' ,  $category->description) ?? '' }}</textarea>

    @error('description')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">

    <label for="">Image</label>
    <input type="file" name="logo_image" >
    @if ($category->logo_image)
    <img src="{{ asset('storage/' . $category->logo_image) }}" style="width: 100px; height:100px">

    @endif
</div>



<div class="form-group">

    <label for="">Status</label>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="active" @checked($category->status == 'active')>
        <label class="form-check-label" for="exampleRadios1">
         Active
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" value="inactive" name="status" @checked($category->status == 'inactive')>
        <label class="form-check-label" for="exampleRadios2">
          Inactive
        </label>
      </div>

      <button type="subbmit" class="btn btn-primary">Save</button>
