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
    <th>name</th>
    <th>Category</th>
    <th>Store</th>
    <th>Status</th>
    <th>date</th>
    <th colspan="2">actions</th>

    <tr>
        @forelse ($products as $product )
            <td>{{ $loop->iteration}}</td>
            <td>{{ $product->name}}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->store->name }}</td>
            <td>{{ $product->status }}</td>
            <td>{{ Carbon::parse($product->created_at)->isoFormat('dddd D')}}</td>
            <td colspan="2">
                <div class="flex-column">
                <a type="button" href="{{ route('products.edit' , $product->id)}}" class="btn btn-outline-primary">Edit</a>

                {{-- <a type="button" href="{{ route('categories.destroy' , $product->id)}}" class="btn btn-outline-danger"">Delete</a> --}}
                </div>
            </td>

    </tr>
        @empty
        <tr>
            <td colspan="9" style="text-align: center">
            products not defined !
            </td>
        @endforelse
    </tr>
</table>
    {{$products->withQueryString()->appends(['search' => 'keysearch'])->links()}}

 @endsection

