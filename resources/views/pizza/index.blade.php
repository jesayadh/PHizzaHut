@extends('layouts.app')
@section('title')

@section('content')
    <h1>Our freshly made pizza!</h1>
    <h3>order it now!</h3>
    @if (Auth::check())
      @if (Auth::user()->user==1)
        <a href="/pizza/create" class="btn btn-primary">Add Pizza</a>
      @endif
    @endif
    <form action="/pizza/search" method="GET">
      <x-input field="search" label="Search" type="text" value="{{ old('search') }}"/>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <div class="row row-cols-1 row-cols-md-3">
      @foreach ($pizzas as $pizza)
      <div class="col mb-4">
        <a href="/pizza/{{$pizza->slug}}">
          <div class="card">
            <img src="/image/{{$pizza->image}}" class="card-img-top" alt="{{$pizza->name}}">
            <div class="card-body">
              <h5 class="card-title">{{$pizza->name}}</h5>
              <p class="card-text">{{$pizza->description}}</p>
              @if (Auth::check())
                @if (Auth::user()->user==1)
                  <a class="btn btn-primary btn-sm" href="/pizza/{{$pizza->id}}/edit" role="button">Update Pizza</a>
                  <form action="/pizza/{{$pizza->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete Pizza</button>
                  </form>
                @endif
              @endif
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    {{ $pizzas->links() }}
@endsection