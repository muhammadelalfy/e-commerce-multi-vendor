@extends('layouts.dashboard')
 @section('title' , 'edit page')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="#">Edit page</a></li>
@endsection

@section('content')

    <form action="{{ route('categories.update' , $category->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        {{-- <input type="hidden" name="_method" value="delete"> --}}
        @include('dashboard.categories._form');


    </form>

 @endsection

