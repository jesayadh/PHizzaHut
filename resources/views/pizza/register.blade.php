@extends('layouts.app')
@section('title')

@section('content')
    <div class="card d-flex justify-content-center mb-3">
        <div class="card-header bg-danger h5 text-light">
            Register
        </div>
        <div class="card-body row justify-content-md-center">
          <form action="/artikel" method="post" enctype="multipart/form-data">
            @csrf
    
            <x-input field="username" label="Username" type="text"/>
            <x-input field="email" label="Email Address" type="text"/>
            <x-input field="password" label="Password" type="text"/>
            <x-input field="password" label="Confirm Password" type="text"/>
            <x-input field="address" label="Address" type="text"/>
            <x-input field="phone" label="Phone Number" type="text"/>
            <x-radioGender />
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
@endsection