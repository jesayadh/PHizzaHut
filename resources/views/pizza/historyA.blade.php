@extends('layouts.app')
@section('title')

@section('content')
    @for ($i = 0; $i < 5; $i++)
        <div class="card">
            <div class="card-body">
                <p>Transaction at 2020-05-17 07:09:11</p>
                <p>User ID : 2</p>
                <p>Username : user</p>
            </div>
        </div>
    @endfor
@endsection