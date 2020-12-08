@extends('layouts.app')
@section('title')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="row no-gutters">
                @foreach ($transaction->pizzas as $pizza)
                    <div class="col-md-7">
                        <img src="/image/{{$pizza->image}}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-5">
                        <div class="card-body">
                            <h2 class="card-title">{{$pizza->name}}</h2>
                            <p class="card-text">{{$pizza->price}}</p>
                            <p>Quantity:{{$pizza->pivot->quantity}}</p>
                        </div>
                    </div>
                @endforeach
                <h1>Final Price : Rp. {{$transaction->totalprice}}</h1>
            </div>
        </div>
    </div>
@endsection