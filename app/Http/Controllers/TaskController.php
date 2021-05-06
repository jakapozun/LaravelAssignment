<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();
        $tasks = $currentUser->tasks;

        return view('users/index', compact('tasks'));
    }

    public function show(Task $task)
    {
        if(auth()->id() != $task->user_id){
            return redirect()->route('todos');
        }
        $statuses = Status::all();
        return view('users/show', compact('task','statuses'));
    }

    public function createTask()
    {
        $statuses = Status::all();
        $users = User::all();
        return view('admin/add-task', compact('statuses','users'));
    }

    public function viewTasks()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('admin/view-tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        $task = $request->validate([
            'user_id' => 'integer|required',
            'title' => 'string|required',
            'short_description' => 'string|required',
            'task_date' => 'date|required',
            'long_description' => 'string|required',
            'status_id' => 'integer|required'
        ]);

        Task::create($task);

        session()->flash('success_message', 'Task created successfully!');

        return redirect()->route('view.tasks');
    }

    public function edit(Task $task)
    {
        $users = User::all();
        $statuses = Status::all();
        return view('admin/edit-task', compact('task','users','statuses'));
    }

    public function update(Task $task, Request $request)
    {
        $newTask = $request->validate([
            'user_id' => 'integer|required',
            'title' => 'string|required',
            'short_description' => 'string|required',
            'task_date' => 'date|required',
            'long_description' => 'string|required',
            'status_id' => 'integer|required'
        ]);

        $task->update($newTask);
        $task->save();

        return redirect()->route('view.tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('view.tasks');
    }

    public function changeStatus(Request $request, Task $task)
    {
        $request->validate([
           'status_id' => 'integer|required'
        ]);

        $task->status_id = $request['status_id'];
        $task->save();

        session()->flash('success_message', 'Status changed successfully!');

        return redirect()->route('todos');
    }
}
