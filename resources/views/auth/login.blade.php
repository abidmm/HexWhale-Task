@extends('layouts.app')
@section('content')
<div class="vh-100 d-flex align-items-center justify-content-center">
  <div class="row w-100 justify-content-center">
    <div class="col-5 p-4 border shadow-sm rounded-3">
      <form action="{{route('login.post')}}" method="post">
        @csrf
        <!-- Email input -->
        <h2 class="text-center mb-5 fw-bold">Log in</h4>
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="email"  class="form-control" name="email"/>
          <label class="form-label" for="form2Example1">Email address</label>
        </div>
      
        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password"  class="form-control" name="password"/>
          <label class="form-label" for="form2Example2">Password</label>
        </div>
      @error('error')
      {{ $message }}
      @enderror
        
      
        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4 form-control">Sign in</button>
      
        <!-- Register buttons -->
        <div class="text-center">
         <a href="{{route('register')}}">Register</a>
        </div>
      </form>
    </div>
  </div>

</div>

@endsection