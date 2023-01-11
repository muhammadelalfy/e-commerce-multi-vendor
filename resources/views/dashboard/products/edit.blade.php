@extends('layouts.dashboard')
 @section('title' , 'edit page')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="#">Edit page</a></li>
@endsection

@section('content')
    <x-alert type="success" />
    <form action="{{ route('products.update' , $product->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        {{-- <input type="hidden" name="_method" value="delete"> --}}
        @include('dashboard.products._form');


    </form>

 @endsection

