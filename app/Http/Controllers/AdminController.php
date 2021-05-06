<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $tasks = Task::all();
        $statuses = Status::all();

        return view('admin/index', compact('users','tasks','statuses'));
    }
}
