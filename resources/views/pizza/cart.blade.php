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
                        <h2 class="card-title">Pizza enak</h2>
                        <p class="card-text">Rp. 100000</p>
                        <p>Quantity:2</p>
                        <x-input field="username" label="Quantity:" type="text"/>
                        <button type="submit" class="btn btn-primary">Update Quantity</button>
                        <button type="submit" class="btn btn-danger">Delete From Cart</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Checkout</button>
        </div>
    </div>
@endsection