<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{

    /**
     * Build a success response
     * @param string|array
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * Build a valid response
     * @param string|array
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function validResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }


    /**
     * Build error response
     * @param string message
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Build error response
     * @param string message
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function errorMessage($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code)->header('Content-Type', 'application/json');
    }
}
