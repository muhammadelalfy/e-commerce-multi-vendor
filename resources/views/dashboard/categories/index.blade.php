@extends('layouts.dashboard')
 @section('title' , 'starter page')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="#">start page</a></li>
@endsection
@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ $request->session()->get('success'); }}
    </div>

@endif
@section('content')

<table class="table">
    <th>#</th>
    <th>image</th>
    <th>name</th>
    <th>description</th>
    <th>parent</th>
    <th>date</th>
    <th colspan="2">actions</th>

    <tr>
        @forelse ($categories as $category )
            <td>{{ $loop->iteration}}</td>
            <td>{{ @$category->image }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->parent }}</td>
            <td>{{ Carbon::parse($category->created_at)->diffForHumans()}}</td>
            <td colspan="2">
                <a type="button" href="{{ route('categories.edit' , $category->id)}}" class="btn btn-outline-primary">Edit</a>
                <a type="button" href="{{ route('categories.destroy' , $category->id)}}" class="btn btn-outline-danger"">Delete</a>

            </td>

    </tr>
        @empty
        <tr>
            <td colspan="9" style="text-align: center">
            Categories not defined !
            </td>
        @endforelse
    </tr>
</table>

 @endsection

