<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('app.admin.tasks.list-task', compact('tasks'));
    }

    public function create($id)
    {
        return view('app.admin.tasks.announcement-admin', ['lomba' => $id]);
    }

    public function store(Request $request)
    {

        
        $request->validate([    
            'idLomba' => 'required',
            'namaTask' => 'required',
            'deskripsiTask' => 'required',
            'tipe' => 'required',
            'lampiran' => 'nullable|file',
            'deadlineTask' => 'nullable|date',
        ]);
            
            
        //dd($request);

        $task = new Task();
        $task->idLomba = $request->idLomba;
        $task->namaTask = $request->namaTask;
        $task->deskripsiTask = $request->deskripsiTask;
        $task->lampiran = $request->lampiran;
        $task->deadlineTask = $request->deadlineTask;
        $task->tipe = $request->tipe;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampirans', 'public');
        }
        $task->lampiran = $lampiranPath;
        $task->save();

        return redirect ('admin/lomba/'. $request->idLomba)->with('success', 'Task created successfully.');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('app.admin.tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        //dd($task);
        return view('app.admin.tasks.edit-list', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'deskripsiTask' => 'required',
            'tipe' => 'required',
            'lampiran' => 'nullable|file',
            'deadlineTask' => 'nullable|date',
            ]);
        
            //dd($request);
        $task = Task::findOrFail($task->id);
        $task->namaTask = $request->namaTask;
        $task->deskripsiTask = $request->deskripsiTask;
        $task->lampiran = $request->lampiran;
        $task->deadlineTask = $request->deadlineTask;
        $task->tipe = $request->tipe;
        //dd($task);

        if ($request->hasFile('lampiran')) {
            if ($task->posterLomba) {
                Storage::disk('public')->delete($task->lampiran);
            }
            $task->lampiran = $request->file('lampiran')->store('lampirans', 'public');
        }
        $task->save();

        return redirect ('admin/lomba/'. $task->idLomba)->with('success', 'Task created successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect ('admin/lomba/'. $task->idLomba)->with('success', 'Task created successfully.');
    }
}
