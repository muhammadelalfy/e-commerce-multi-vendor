@extends('layouts.dashboard')
@section('title' , 'profile page')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="#">Profile page</a></li>
@endsection

@section('content')

    <form action="{{ route('dashboard.profile.update') }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf

        <div class="form-row">
            <div class="col-md-6">
                <x-form.input name="first_name" label="First Name" :value="$user->profile->first_name"/>
            </div>
            <div class="col-md-6">
                <x-form.input name="last_name" label="Last Name" :value="$user->profile->last_name"/>
            </div>
        </div>


        <div class="form-row">
            <div class="col-md-6">
                <x-form.input name="birthday" label="Birthday" :value="$user->profile->birthday"/>
            </div>
            <div class="col-md-6">
                <x-form.radio name="gender" label="Last Name" :options="['male' => 'Male' , 'female' => 'female']" :checked="$user->profile->gender"/>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6">
                <x-form.input name="street_address" label="Street Address" :value="$user->profile->street_address"/>
            </div>
            <div class="col-md-6">
                <x-form.input name="city" label="city" :value="$user->profile->city"/>
            </div>
            <div class="col-md-6">
                <x-form.input name="state" label="state" :value="$user->profile->state"/>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6">
                <x-form.input name="postal_code" label="Postal Code" :value="$user->profile->postal_code"/>
            </div>
            <div class="col-md-6">
                <x-form.select name="country" label="Country" :options="$countries" :selected="$user->profile->country"/>
            </div>
            <div class="col-md-6">
                <x-form.select name="locale" label="Locale" :options="$locales" :selected="$user->profile->locale"/>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6">

            </div>
        </div>
    </form>

@endsection

