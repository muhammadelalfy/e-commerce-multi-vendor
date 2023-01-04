@extends('layouts.dashboard')
 @section('title' , $category->name)
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">$category->name</li>
@endsection

@section('content')

    <table class="table">
        <th>#</th>
        <th>Name</th>
        <th>Store</th>
        <th>Status</th>
        <th>Created at</th>
@php
$products = $category->products()->with('store')->latest()->paginate(5);
@endphp
        <tr>
            @forelse ($category->products()->with('store')->latest()->paginate(5) as $product )
                <td>{{ $loop->iteration}}</td>
                <td>{{ $product->name}}</td>
                <td>{{ $product->store->name }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ Carbon::parse($product->created_at)->isoFormat('dddd D')}}</td>

        </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center">
                    products not defined !
                </td>
                @endforelse
            </tr>
    </table>
    {{$products->withQueryString()->links()}}

@endsection

