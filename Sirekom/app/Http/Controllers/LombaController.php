<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use Illuminate\Support\Facades\Storage;

class LombaController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust the mime types and max size as needed
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('public/files');
        }

        // Create new Lomba instance and save data
        $lomba = new Lomba();
        $lomba->name = $request->input('name');
        $lomba->desc = $request->input('desc');
        $lomba->file_path = $filePath ?? null; // Save the file path if file was uploaded
        $lomba->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Lomba added successfully!');
    }
}
