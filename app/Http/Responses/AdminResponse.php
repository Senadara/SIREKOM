<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class AdminResponse
{
    public static function success($data, $message = '', $code = 201)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function error($message, $errors = [], $code = 422)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }
}
