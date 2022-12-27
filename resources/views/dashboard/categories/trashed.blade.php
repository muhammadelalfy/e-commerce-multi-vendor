@extends('layouts.dashboard')
 @section('title' , 'Trashed Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="#">start page</a></li>
@endsection


@section('content')
    <x-alert type="success" />
    <x-alert type="info" />

    <a class="btn btn-sm btn-outline-primary " href="{{route('categories.create')}}">Create</a>

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
    <th>deleted at</th>
    <th colspan="2">actions</th>

    <tr>
        @forelse ($categories as $category )
            <td>{{ $loop->iteration}}</td>
            <td><img src="{{ asset('storage/' . $category->logo_image) }}" style="width: 100px; height:100px"></td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ Carbon::parse($category->deleted_at)->isoFormat('dddd D')}}</td>
            <td>
                <form action="{{ route('categories.restore', $category->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-outline-dark">Restore</button>
                </form>
            </td>
            <td>
                <form action="{{ route('categories.forceDelete', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Force Delete</button>
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

