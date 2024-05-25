<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.mahasiswa.submission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('lampiran')) {
            $images = $request->file('lampiran');
            foreach ($images as $image) {
                $randomString = Str::random(5);
                $imageName = $randomString . '_' . $image->getClientOriginalName();
                $image->storeAs(public_path('storage/submission'), $imageName);

                $file = new Submission();
                $file->filename = $imageName;
                $file->save();
            }
            return response()->json(['success' => 'Files uploaded successfully.']);
        } else {
            return response()->json(['error' => 'No files found to upload.'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $files = Submission::all();

        foreach ($files as $file) {
            $filePath = public_path('storage/submission/' . $file->filename);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $file->delete();
        }

        return response()->json(['success' => 'All files deleted successfully.']);
    }
}
