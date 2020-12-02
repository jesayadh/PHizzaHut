@extends('layouts.app')
@section('title')

@section('content')
<div class="card d-flex justify-content-center mb-3">
    <div class="card-header bg-danger h5 text-light">
        Add New Pizza
    </div>
    <div class="card-body row justify-content-md-center">
      <form action="/pizza" method="post" enctype="multipart/form-data">
        @csrf

        <x-input field="name" label="Name" type="text"/>
        <x-input field="price" label="Price" type="text"/>
        <x-input field="description" label="Description" type="text"/>
        <x-inputphoto />
        
        <button type="submit" class="btn btn-primary">Add Pizza</button>
      </form>
    </div>
</div>
@endsection