<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('app.register'); // assuming your Blade template is named 'register.blade.php'
    }

    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'prodi' => 'required|string|max:100',
            'no_whatsapp' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        // Process the form data, e.g., save to the database

        // For now, just return the validated data as a JSON response
        return response()->json($validatedData);
    }
}
