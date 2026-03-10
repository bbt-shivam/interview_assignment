<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait AjaxResponse
{
    protected function success(
        mixed $data = null,
        string $message = 'Request completed successfully',
        int $status = 200,
        ?string $redirect = null
    ): JsonResponse {

        return response()->json([
            'error' => false,
            'message' => $message,
            'redirect' => $redirect,
            'data' => $data,
        ], $status);
    }

    protected function error(
        string $message = 'Something went wrong!',
        int $status = 200,
        mixed $errors = null
    ): JsonResponse {
        return response()->json([
            'error' => [
                'status' => $status,
                'message' => $message,
                'errors' => $errors,
            ],
        ], $status);
    }
}
