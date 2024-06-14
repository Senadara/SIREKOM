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
        // Validate the request data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log in with the provided credentials
        if (!Auth::guard('admin')->attempt($request->only('username', 'password'))) {
            return response()->json([
                'message' => 'Invalid username or password',
            ], 401);
        }

        // Get the authenticated admin
        $admin = Admin::where('username', $request['username'])->firstOrFail();

        // Generate the token (assuming you are using Laravel Passport or Sanctum for token management)
        $token = $admin->createToken('auth_token')->plainTextToken;

        // Return the success response with the token
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    public function adminLogoutAPI()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
