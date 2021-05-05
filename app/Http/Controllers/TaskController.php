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

    public function addTask()
    {
        return view('users/add-new');
    }
}
