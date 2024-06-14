<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function update(Request $request, $id)
    {

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
