@extends('layouts.app')
@section('title')

@section('content')
    @foreach ($user->transactions as $transaction)
    <div class="card">
        <div class="card-body">
        <a href="/transaction/{{$transaction->id}}"><p>Transaction at {{$transaction->created_at}}</p></a>
        </div>
    </div>
    @endforeach
@endsection