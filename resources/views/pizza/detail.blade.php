@extends('layouts.app')
@section('title')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-7">
                <img src="/image/{{$pizza->image}}" class="card-img" alt="...">
              </div>
              <div class="col-md-5">
                <div class="card-body">
                  <h2 class="card-title">{{$pizza->name}}</h2>
                  <p class="card-text">{{$pizza->description}}</p>
                  <p class="card-text">Rp. {{$pizza->price}}</p>
                  @if (Auth::check())
                    @if (Auth::user()->user==2)
                      <form action="{{route('cart.store',$pizza->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-input field="quantity" label="Quantity" type="text"/>
                      
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                      </form>
                    @endif
                  @endif
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection