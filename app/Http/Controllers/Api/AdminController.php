<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Responses\AdminResponse;


class AdminController extends Controller
{

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $input = $request->all();
        $validator = Validator::make($input, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return AdminResponse::error('Validation Error.', $validator->errors(), 422);
        }
        $admin = Admin::create($input);
        return AdminResponse::success($admin, 'Admin created successfully.', 201);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'username' => 'required|max:20|unique:admins,username',
            'password' => 'required|min:8',
        ]);

        $admin = Admin::find($id);
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return response()->json([
            'status' => 'success',
            //'message' => 'Admin baru berhasil ditambahkan',
            'admin' => $admin,
        ]);
    }
}
