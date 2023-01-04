@extends('layouts.dashboard')
 @section('title' , 'starter page')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="#">start page</a></li>
@endsection


@section('content')
    <x-alert type="success" />
    <x-alert type="info" />

    <a class="btn btn-sm btn-outline-primary " href="{{route('categories.create')}}">Create</a>
    <a class="btn btn-sm btn-outline-dark " href="{{route('categories.trashed')}}">trashed</a>

    <form action="{{\Illuminate\Support\Facades\URL::current()}}"  method="get" class="d-flex justify-content-between mt-4">
        <x-form.input name="name" placeholder-="Name" class="mx-2" :value="request('name')" />
        <select id="select" name="status" class="form-control mx-2">
            <option value="">All</option>
            <option value="active" @selected(request('status') == 'active')>Active</option>
            <option value="inactive"  @selected(request('status') == 'inactive')>Inactive</option>
        </select>
        <button class="btn btn-dark mx-2" >Filter</button>
    </form>

<table class="table">
    <th>#</th>
    <th>image</th>
    <th>name</th>
    <th>description</th>
    <th>products_count</th>
    <th>parent</th>
    <th>date</th>
    <th colspan="2">actions</th>

    <tr>
        @forelse ($categories as $category )
            <td>{{ $loop->iteration}}</td>
            <td><img src="{{ asset('storage/' . $category->logo_image) }}" style="width: 100px; height:100px"></td>
            <td> <a href="{{route('categories.show' , $category->id)}}">{{ $category->name }}</a></td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->product_number }}</td>
            <td>{{ $category->parent->name }}</td>
            <td>{{ Carbon::parse($category->created_at)->isoFormat('dddd D')}}</td>
            <td>
                <div class="flex-column">
                <a type="button" href="{{ route('categories.edit' , $category->id)}}" class="btn btn-outline-primary">Edit</a>


                {{-- <a type="button" href="{{ route('categories.destroy' , $category->id)}}" class="btn btn-outline-danger"">Delete</a> --}}
                </div>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
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
    {{$categories->withQueryString()->appends(['search' => 'keysearch'])->links()}}
 @endsection

