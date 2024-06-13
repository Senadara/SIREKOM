<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Responses\AdminResponse;

class AdminController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            // Validasi data yang diterima
            $input = $request->all();
            $validator = Validator::make($input, [
                'username' => 'required|string|max:50|unique:admins,username',
                'password' => 'required|string|min:8',
            ]);
            if ($validator->fails()) {
                return AdminResponse::error('Validation Error.', $validator->errors(), 422);
            }
            $admin = Admin::create($input);
            return AdminResponse::success($admin, 'Admin created successfully.', 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
