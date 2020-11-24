@extends('layouts.app')
@section('title')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-7">
                <img src="https://www.biggerbolderbaking.com/wp-content/uploads/2019/07/15-Minute-Pizza-WS-Thumbnail-500x375.png" class="card-img" alt="...">
              </div>
              <div class="col-md-5">
                <div class="card-body">
                    <form action="/artikel" method="post" enctype="multipart/form-data">
                        @csrf
                
                        <x-input field="name" label="Name" type="text"/>
                        <x-input field="price" label="Price" type="text"/>
                        <x-input field="description" label="Description" type="text"/>
                        {{-- <x-input field="image" label="image" type="text"/> --}}
                        <button type="submit" class="btn btn-primary">Edit Pizza</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection