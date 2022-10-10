@extends('layouts.dashboard')
 @section('title' , 'starter page')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="#">start page</a></li>
@endsection

@section('content')

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        {{-- <input type="hidden" name="_method" value="delete"> --}}
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" value="" class="form-control">
    </div>

    <div class="form-group">

        <label for="">Parent</label>
        <select type="text" name="parent_id" value="" class="form-control">

            @forelse ($parents as $parent)
            <option value="">{{ $parent->name }}</option>
            @empty
            <option value="">No parents Found</option>
            @endforelse

        </select>
    </div>

    <div class="form-group">


        <label for="">description</label>
        <textarea name="description" id="" class="form-control"></textarea>

    </div>

    <div class="form-group">

        <label for="">Image</label>
        <input type="file" name="logo_image" class="form-control">
    </div>

    <div class="form-group">

        <label for="">Status</label>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="active" checked>
            <label class="form-check-label" for="exampleRadios1">
             Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="inactive" name="status">
            <label class="form-check-label" for="exampleRadios2">
              Inactive
            </label>
          </div>

          <button type="subbmit" class="btn btn-primary">Save</button>

    </form>

 @endsection

