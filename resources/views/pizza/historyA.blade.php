@extends('layouts.app')
@section('title')

@section('content')
    @foreach ($user as $transaction)
        <div class="card">
                <div class="card-body">
                    <p>Transaction at {{$transaction->created_at}}</p>
                    <p>User ID :  {{$transaction->user_id}}</p>
                    <p>Username :  {{$transaction->user->username}}</p>
                </div>
            </div>
    @endforeach
@endsection