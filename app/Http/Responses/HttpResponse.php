<?php
declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class HttpResponse
{
    /**
     * @param string $message
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    public static function jsonError(string $message, array $data = [], int $code = 500): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    public static function jsonSuccess(array $data = [], int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $data
        ], $code);
    }

}
