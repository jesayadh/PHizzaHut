@extends('layouts.app')
@section('title')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-7">
                <img src="/img/{{$pizza->image}}" class="card-img" alt="...">
              </div>
              <div class="col-md-5">
                <div class="card-body">
                  <form action="/pizza/{{$pizza->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-input field="name" label="Name" type="text" value="{{$pizza->name}}"/>
                    <x-input field="price" label="Price" type="text" value="{{$pizza->price}}"/>
                    <x-input field="description" label="Description" type="text" value="{{$pizza->description}}"/>
                    <x-inputphoto />
                    <button type="submit" class="btn btn-primary">Edit Pizza</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection