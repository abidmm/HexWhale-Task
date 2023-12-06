@extends('layouts.layout')
@section('content')
    <div class="container mt-4">
        <div class="p-4 w-100" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; border-radius:20px;">
            <div class="d-flex align-items-center justify-content-center">
                <div class="row w-100 justify-content-center">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                          <h5 class="card-title fw-bold d-inline">Title :</h5>
                          <p class="card-text d-inline">{{$task->title}}</p>
                        </div>
                        <div class="mb-4">
                          <h5 class="card-title fw-bold d-inline">Category :</h5>
                          <p class="card-text d-inline">{{$task->category->category}}</p>
                        </div>
                        <div class="mb-4">
                            <h5 class="card-title fw-bold d-inline">Description :</h5>
                            <p class="card-text d-inline">{!! str_replace("\n", ', ', $task->description) !!}</p>
                          </div>
                          <div class="mb-4">
                            <h5 class="card-title fw-bold d-inline">Due Date :</h5>
                            <p class="card-text d-inline">{{$task->due_date}}</p>
                          </div>

                        <div>
                            <a href="{{url('task/list')}}" class="btn btn-primary">Back</a>
                        </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
