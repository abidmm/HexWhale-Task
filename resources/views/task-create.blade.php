@php
use App\Models\Category;
 $categories = Category::latest()->get();   
@endphp
@extends('layouts.layout')
@section('content')
    <div class="container mt-4">
        <div class="p-4 w-100" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; border-radius:20px;">
            <div class="d-flex align-items-center justify-content-center">

                <form action="{{route('task.post')}}" method="post" style="width: 600px">
                    @csrf
                    <h2 class="mb-4">Task Form</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        @error('title')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category">
                            <option disabled selected>Select a category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : '' }}>{{$category->category}}</option>
                            @endforeach
                          </select>
                        @error('category')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="5">{{old('description')}}</textarea>
                        @error('description')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-5">
                        <label for="exampleInputEmail1" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="due_date">
                        @error('due_date')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
