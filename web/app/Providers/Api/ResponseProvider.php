<?php

namespace App\Providers\Api;

use Illuminate\Http\JsonResponse;

class ResponseProvider
{
    public function SUCCESS($data, $message): JsonResponse
    {
        $response = [
            'resultCode' => "SUCCESS",
            'data' => $data,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

    public function EXCEPTION($data, $message, $code = 200, $error = null): JsonResponse
    {
        $response = [
            'resultCode' => "EXCEPTION",
            'data' => $data,
            'message' => $message,
        ];

        if (isset($error)) $response['error'] = $error;

        return response()->json($response, $code);
    }

    public function FAIL($data, $message, $code = 200): JsonResponse
    {
        $response = [
            'resultCode' => "FAIL",
            'data' => $data,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

}

