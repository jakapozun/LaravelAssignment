<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        return view('admin.view-statuses', compact('statuses'));
    }

    public function createStatus()
    {
        return view('admin.add-status');
    }

    public function store(Request $request)
    {
        $status = $request->validate([
            'name' => 'string|required'
        ]);

        Status::create($status);

        return redirect()->route('view.statuses');
    }

    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('view.statuses');
    }

    public function edit(Status $status)
    {
        return view('admin/edit-status', compact('status'));
    }

    public function update(Status $status, Request $request)
    {
        $newStatus = $request->validate([
            'name' => 'string|required'
        ]);

        $status->name = $newStatus['name'];

        $status->save();

        return redirect()->route('view.statuses');
    }
}
