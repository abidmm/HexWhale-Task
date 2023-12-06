@extends('layouts.layout')
@section('content')
    <div class="container mt-4">
        <div class="p-4 w-100" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; border-radius:20px;">
            <div class="float-end">
                <!-- Button trigger modal -->
                <a href="{{ route('task-create') }}" class="btn btn-primary mb-2">Add Task</a>
            </div>
            <table class="table border " style="border-radius: 18px">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{$task->category->category}}</td>
                            <td>{!! str_replace("\n", ', ', $task->description) !!}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                <a href="{{ route('task.single', ['id' => $task->id]) }}" class="btn btn-secondary">View</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $task->id }}">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="edit{{ $task->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit task</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('task.update', ['id' => $task->id]) }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Title</label>
                                                        <input type="text" class="form-control" name="title"
                                                            value="{{ $task->title }}">
                                                            @error('title')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Category</label>
                                                        <select class="form-select" name="category_id">
                                                            <option disabled selected>Select a category</option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{$category->id}}" {{$task->category_id == $category->id ? 'selected' : ''}}>{{$category->category}}</option>
                                                            @endforeach
                                                          </select>
                                                          @error('category')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Description</label>
                                                        <textarea class="form-control" name="description" rows="5">{{ $task->description }}</textarea>
                                                        @error('description')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="mb-5">
                                                        <label for="exampleInputEmail1" class="form-label">Due Date</label>
                                                        <input type="date" class="form-control" name="due_date"
                                                            value="{{ $task->due_date }}">
                                                            @error('due_date')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- delete --}}
                                <form action="{{ route('task.delete', ['id' => $task->id]) }}" class="d-inline pl-2"
                                    method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
