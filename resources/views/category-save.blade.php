@extends('layouts.layout')
@section('content')
    <div class="container mt-4">
        <div class="p-4 w-100" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; border-radius:20px;">
            <div class="d-flex align-items-center justify-content-center">
                <form action="{{route('category.post',['id'=>$category->id])}}" method="post" style="width: 600px">
                    @csrf
                    <h2 class="mb-4">Add Category</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" value="{{$category->category}}">
                        @error('category')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
    
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </form>
            </div>
           
        </div>
    </div>
@endsection
