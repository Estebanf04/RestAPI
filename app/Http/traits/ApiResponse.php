<?php

namespace App\Http\traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


trait ApiResponse
{

    public function successResponse($message, $data = null, $code = Response::HTTP_OK, $apicode = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'id' => $data
        ],$apicode);
    }

    public function errorResponse($message = null, $code = Response::HTTP_INTERNAL_SERVER_ERROR, $apicode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message
        ],$apicode);
    }

}