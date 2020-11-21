@extends('layouts.app')
@section('title')

@section('content')
    <div class="card d-flex justify-content-center">
        <div class="card-header bg-danger h5 text-light">
            Login
        </div>
        <div class="card-body row justify-content-md-center">
            <form>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-5 col-form-label">E-Mail Address</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-5 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        Remember Me
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    <a href="#" class="ml-3">Forgot Your Password?</a>
                  </div>
                </div>
            </form>
        </div>
    </div>
@endsection