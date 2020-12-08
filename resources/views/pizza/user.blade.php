@extends('layouts.app')
@section('title')

@section('content')
    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($users as $user)
          <div class="col mb-4">
              <div class="card bg-danger" style="width: 13rem;">
                  <div class="card-header text-light">
                    User ID: {{$user->id}}
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Username : {{$user->username}}</li>
                    <li class="list-group-item">Email : {{$user->email}}</li>
                    <li class="list-group-item">Address : {{$user->address}}</li>
                    <li class="list-group-item">Phone Number : {{$user->phone}}</li>
                    <li class="list-group-item">Gender : {{$user->gender}}</li>
                  </ul>
              </div>
          </div>
        @endforeach
    </div>
@endsection