@extends('layouts.app')
@section('title')

@section('content')
    <h1>Our freshly made pizza!</h1>
    <h3>order it now!</h3>

    <div class="row row-cols-1 row-cols-md-3">
        @for ($i = 0; $i < 10; $i++)
          <div class="col mb-4">
            <div class="card">
              <img src="https://www.biggerbolderbaking.com/wp-content/uploads/2019/07/15-Minute-Pizza-WS-Thumbnail-500x375.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Pizza enak</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur aliquid necessitatibus omnis tempora tempore saepe esse quaerat, a adipisci porro in eligendi sequi pariatur veniam sit aperiam aspernatur iure.</p>
              </div>
            </div>
          </div>
        @endfor
    </div>
@endsection