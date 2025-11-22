<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo_list = Todo::all();
        return view('todo', compact('todo_list'));
    }

    public function create()
    {
        return view('add');
    }

    public function store(TodoRequest $request)
    {
        Todo::create($request->validated());

        return redirect()->route('todo.index')->with('success', 'Todo task created successfully.');
    }

    public function edit(string $id)
    {
        $task = Todo::find($id);

        return view('edit', compact('task'));
    }


    public function update(TodoRequest $request, string $id)
    {
        Todo::find($id)->update($request->validated());

        return redirect()->route('todo.index')->with('success', "Todo task $id updated successfully.");
    }

    public function destroy(Request $request, string $id)
    {
        $isPermanent = $request->boolean('isPermanent');

        if(!$isPermanent) {
            Todo::find($id)->delete();

            return redirect()->route('todo.index')->with('success', "Todo task $id was moved to trash.");
        }

        Todo::withTrashed()->find($id)->forceDelete();
        return redirect()->route('todo.trash')->with('success', "Todo task $id was permanently deleted!");
    }

    // USER DEFINED CONTROLLER FUNCTIONS

    public function restore(string $id)
    {
        Todo::withTrashed()->find($id)->restore();
        return redirect()->route('todo.trash')->with('success', "Todo task $id was successfully restored!");
    }

    public function trash()
    {
        $deleted_tasks = Todo::onlyTrashed()->get();

        return view('trash', compact('deleted_tasks'));
    }

    // Irreversible, cannot go back to 'In Progress'
    public function check(Request $request, string $id)
    {
        Todo::find($id)->update(['status' => 'Completed']);

        $isFromCurrentTaskPage = $request->boolean('isFromCurrentTaskPage') ?? false;

        if($isFromCurrentTaskPage) {
            return redirect()->route('todo.current')->with('success', "Todo task $id completed!");
        }

        return redirect()->route('todo.index')->with('success', "Todo task $id completed!");
    }

    public function current()
    {
        $current_tasks = Todo::where('status', 'In Progress')->get();

        return view('current', compact('current_tasks'));
    }

    public function completed()
    {
        $completed_tasks = Todo::where('status', 'Completed')->get();

        return view('completed', compact('completed_tasks'));
    }

    public function search(Request $request)
    {
        $search_name = $request->str('search_name');
        $results = Todo::where('task_name', 'LIKE', "%{$search_name}%")->get();

        return view('search', compact('results', 'search_name'));
    }
}
