<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['adminLoginAPI']]);
    }

    public function adminLoginAPI(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::guard('admin')->attempt($request->only('username', 'password'))) {
            return response()->json([
                'message' => 'Invalid username or password',
            ], 401);
        }

        $admin = Admin::where('username', $request['username'])->firstOrFail();

        $token = $admin->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    public function adminLogoutAPI(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        if ($admin) {
            $request->user('admin')->currentAccessToken()->delete();

            Auth::guard('admin')->logout();

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No authenticated admin found',
            ], 401);
        }
    }

}
