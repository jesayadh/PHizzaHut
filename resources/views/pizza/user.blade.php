@extends('layouts.app')
@section('title')

@section('content')
    <div class="row row-cols-1 row-cols-md-3">
        @for ($i = 0; $i < 10; $i++)
        <div class="col mb-4">
            <div class="card bg-danger" style="width: 13rem;">
                <div class="card-header text-light">
                  User ID: 1
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Username : admin</li>
                  <li class="list-group-item">Email : admin@adm.com</li>
                  <li class="list-group-item">Address : admin home</li>
                  <li class="list-group-item">Phone Number : 08123123123</li>
                  <li class="list-group-item">Gender : male</li>
                </ul>
            </div>
        </div>
        @endfor
    </div>
@endsection