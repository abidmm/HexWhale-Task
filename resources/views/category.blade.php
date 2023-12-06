@extends('layouts.layout')
@section('content')
    <div class="container mt-4">
        <div class="p-4 w-100" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; border-radius:20px;">
            <div class="float-end">
                <!-- Button trigger modal -->
                <a href="{{ route('category-create') }}" class="btn btn-primary mb-2">Add Category</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category }}</td>
                            <td><a href="{{ route('category-create', ['id' => $category->id]) }}"
                                    class="btn btn-primary">edit</a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#DeleteModal{{ $category->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="DeleteModal{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this category?</p>
                                                <p class="text-danger">Deleting this category will delete all related tasks.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('category.delete', ['id' => $category->id]) }}"
                                                    method="post">
                                                    @method ('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
