@extends('layouts.app')
@section('content')
    <div class="vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-5 p-4 border shadow-sm rounded-3">
                <form action="{{route('register.post')}}" method="post">
                    @csrf
                    <h2 class="text-center mb-5 fw-bold">Register</h4>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                            
                            @error('name')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{old('email')}}" />
                            
                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example2">Password</label>
                            <input type="password" class="form-control" name="password" />
                           
                            @error('password')<span class="text-danger">{{$message}}</span>@enderror
                        </div>



                        <!-- Submit button -->
                        <button  type="submit" class="btn btn-primary btn-block mb-4 form-control">Register</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                             <a href="{{url('')}}">Login</a>
                        </div>
                </form>
            </div>
        </div>

    </div>
@endsection
