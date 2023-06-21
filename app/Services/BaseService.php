<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseService extends Controller
{
    public function successResponse($data, $message = '', $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    public function errorResponse($message, $status = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
