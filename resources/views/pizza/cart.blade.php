@extends('layouts.app')
@section('title')

@section('content')
    <div class="container">
        <div class="card mb-3">
                <?php
                    $total = 0;
                ?>
            @foreach ($user->pizzas as $pizza)
                <?php
                    $total += $pizza->price * $pizza->pivot->quantity;
                ?>
                <div class="row no-gutters">
                    <div class="col-md-7">
                        <img src="img/{{$pizza->image}}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-5">
                        <div class="card-body">
                            <h2 class="card-title">{{$pizza->name}}</h2>
                            <p class="card-text">Rp. {{$pizza->price}}</p>
                            <p>Quantity : {{$pizza->pivot->quantity}}</p>
                            <p>Sub-total : Rp. {{$pizza->price * $pizza->pivot->quantity}}</p>
                            <form action="/cart/{{$pizza->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <x-input field="quantity" label="Quantity:" type="text"/>
                                <div class="row ml-1">
                                    <button type="submit" class="btn btn-primary btn-sm">Update Quantity</button>
                                </form>
                                <form action="/cart/{{$pizza->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm ml-1">Delete From Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <h1>Total Price : {{$total}}</h1>
            <form action="{{route('transaction.store',$total)}}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-secondary">Checkout</button>
            </form>
        </div>
    </div>
@endsection