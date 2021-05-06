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
        $tasks = Task::all();

        return view('users/index', compact('tasks'));
    }

    public function wo()
    {
        $tasks = Task::all();

        return view('users/working-on', compact('tasks'));
    }

    public function done()
    {
        $tasks = Task::all();

        return view('users/done', compact('tasks'));
    }

    public function show(Task $task)
    {
        return view('users/show', compact('task'));
    }

    public function createTask()
    {
        $statuses = Status::all();
        $users = User::all();
        return view('admin/add-task', compact('statuses','users'));
    }

    public function viewTasks()
    {
        $tasks = Task::all();
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
}
