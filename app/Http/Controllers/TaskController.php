<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
        return view('admin/add-task');
    }

    public function viewTasks()
    {
        return view('admin/view-tasks');
    }
}
