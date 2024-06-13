<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('app.admin.tasks.list-task', compact('tasks'));
    }

    public function create(Request $id)
    {
        return view('app.admin.tasks.announcement-admin', ['lomba' => $id]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_buka' => 'required|date',
            'type' => 'required',
            'lampiran' => 'nullable|file',
            'tanggal_deadline' => 'nullable|date',
        ]);

        $task = new Task();
        $task->judul = $request->judul;
        $task->deskripsi = $request->deskripsi;
        $task->tanggal_buka = $request->tanggal_buka;
        $task->type = $request->type;
        if ($request->hasFile('lampiran')) {
            $fileName = time() . '.' . $request->lampiran->extension();
            $request->lampiran->move(public_path('uploads'), $fileName);
            $task->lampiran = $fileName;
        }
        $task->tanggal_deadline = $request->tanggal_deadline;
        $task->save();

        return redirect ('admin/lomba/'. $request->id)->with('success', 'Task created successfully.');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('app.admin.tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('app.admin.tasks.edit-list', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_buka' => 'required|date',
            'type' => 'required',
            'lampiran' => 'nullable|file',
            'tanggal_deadline' => 'nullable|date',
        ]);

        $task = Task::findOrFail($id);
        $task->judul = $request->judul;
        $task->deskripsi = $request->deskripsi;
        $task->tanggal_buka = $request->tanggal_buka;
        $task->type = $request->type;
        if ($request->hasFile('lampiran')) {
            $fileName = time() . '.' . $request->lampiran->extension();
            $request->lampiran->move(public_path('uploads'), $fileName);
            $task->lampiran = $fileName;
        }
        $task->tanggal_deadline = $request->tanggal_deadline;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
