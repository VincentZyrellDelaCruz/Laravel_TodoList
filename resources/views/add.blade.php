@extends('layouts.app')

@section('title')
    <title>Add Task</title>
@endsection

@section('content')
    <h1 class="fw-bolder mb-3">Add Task</h1>

    <div class="p-3 border shadow rounded-4 mb-3 w-75">
        <form action="{{ route('todo.store') }}" method="POST" id="addTodoForm">
            @csrf
            <div class="form-group mb-3">
                <label for="task_name" class="form-label">Task Name</label>
                <input type="text" name="task_name" value="{{ old('task_name') }}" class="form-control rounded-3" id="task_name" placeholder="Enter todo title">
                @error('task_name')
                    <div class="text-danger"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select name="priority" class="form-select rounded-3" id="priority">
                    <option value="" disabled selected>Select priority</option>
                    <option value="High" {{ old('priority') === 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ old('priority') === 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ old('priority') === 'Low' ? 'selected' : '' }}>Low</option>
                </select>
                @error('priority')
                    <div class="text-danger"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="deadline" class="form-label">Due Date</label>
                <input type="date" name="deadline" value="{{ old('deadline') }}" class="form-control rounded-3" id="deadline">
                @error('deadline')
                    <div class="text-danger"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="status" value="In Progress">
            <div class="d-flex gap-3 justify-content-end mt-3">
                <button type="reset" class="btn btn-danger px-3">Reset</button>
                <button type="submit" class="btn btn-success">Add Task</button>
            </div>
        </form>
    </div>
@endsection
