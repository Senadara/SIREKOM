<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{

    public function index()
    {
        $submissions = Submission::all();
        return view('app.mahasiswa.detailInfodanSubmit', ['submissions' => $submissions]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'lampiran' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'idTask' => 'required|integer',
            'idPeserta' => 'required|integer',
            'desc' => 'nullable|string'
        ]);

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = Str::random(5) . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('submission', $fileName, 'public');

            Submission::create([
                'id' => $request->input('id'),
                'idTask' => $request->input('idTask'),
                'idPeserta' => $request->input('idPeserta'),
                'lampiran' => $filePath,
            ]);

            return redirect()->back()->with('success', 'File uploaded successfully.');
        } else {
            return redirect()->back()->with('error', 'No file found to upload.');
        }
    }

    public function edit(Request $request, $id)
    {
        $submission = Submission::findOrFail($id);

        $request->validate([
            'lampiran' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        if ($request->hasFile('lampiran')) {
            if ($submission->lampiran) {
                Storage::disk('public')->delete($submission->lampiran);
            }

            $file = $request->file('lampiran');
            $fileName = Str::random(5) . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('submission', $fileName, 'public');

            $submission->lampiran = $filePath;
            $submission->save();

            return redirect()->back()->with('success', 'File updated successfully.');
        } else {
            return redirect()->back()->with('error', 'No file found to update.');
        }
    }
    public function destroy($id)
    {
        $submission = Submission::findOrFail($id);
        Storage::disk('public')->delete($submission->lampiran);
        $submission->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
    public function detailInfodanSubmit($idLomba)
    {
        $submissions = Submission::where('idTask', $idLomba)->get();
        $lomba = Lomba::findOrFail($idLomba);

        return view('app.mahasiswa.detailInfodanSubmit', compact('submissions', 'lomba'));
    }
}

