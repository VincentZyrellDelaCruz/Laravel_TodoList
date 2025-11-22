@extends('layouts.app')

@section('title')
    <title>Todo List</title>
@endsection

@section('content')
    <h1 class="fw-bolder mb-4">Completed Todo Tasks</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endisset

    <p class="fs-5"><b>Total:</b> {{ $completed_tasks->count() }}</p>

    <div class="row d-flex align-items-center fw-bold fs-5 px-3">
        <div class="col-md-1">
            <p class="">Id</p>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <p class="">Tasks</p>
        </div>
        <div class="col-md-1 d-flex justify-content-center">
            <p class="">Priority</p>
        </div>
        <div class="col-md-2 d-flex justify-content-center">
            <p class="">Deadline</p>
        </div>
        <div class="col-md-2">
            <p class="">Action</p>
        </div>
    </div>

    <hr>

    @if($completed_tasks->isEmpty())

        <div class="p-3 border shadow rounded-4 d-flex align-items-center justify-content-center">
            <p class="fs-5 fw-bold">The list is currently empty</p>
        </div>

    @else

        <ul class="list-unstyled">
            @foreach ($completed_tasks as $task)
                <li class="p-3 border shadow rounded-4 mb-3">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-1">
                            <p class="mb-auto fs-5">{{ $task->id }}</p>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <p class="mb-auto fs-5">{{ $task->task_name }}</p>
                        </div>
                        <div class="col-md-1 d-flex justify-content-center">
                            <p class="{{ $task->priority === 'High' ? 'bg-danger' : ($task->priority === 'Medium' ? 'bg-warning' : 'bg-primary') }}
                                text-white rounded-5 fw-bold px-3 py-1 mb-auto">{{ $task->priority }}</p>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <p class="mb-auto fs-5">{{ $task->deadline }}</p>
                        </div>
                        <div class="col-md-2 d-flex gap-3">
                            <a href="{{ route('todo.edit', ['todo' => $task->id]) }}" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Update"><i class="bi bi-pencil fs-5"></i></a>

                            <form action="{{ route('todo.destroy', ['todo' => $task->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="bi bi-trash-fill text-danger fs-5"></i></button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    @endif
@endsection


