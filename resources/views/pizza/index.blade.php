@extends('layouts.app')
@section('title')

@section('content')
    <h1>Our freshly made pizza!</h1>
    <h3>order it now!</h3>
    <a href="/pizza/create" class="btn btn-primary">Add Pizza</a>
    <div class="row row-cols-1 row-cols-md-3">
      @foreach ($pizzas as $pizza)
      <div class="col mb-4">
        <a href="/pizza/{{$pizza->slug}}">
          <div class="card">
            <img src="/image/{{$pizza->image}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$pizza->name}}</h5>
              <p class="card-text">{{$pizza->description}}</p>
              <a class="btn btn-primary btn-sm" href="/pizza/{{$pizza->id}}/edit" role="button">Update Pizza</a>
              <form action="/pizza/{{$pizza->id}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete Pizza</button>
              </form>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
@endsection