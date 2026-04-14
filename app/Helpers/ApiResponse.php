<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;

class ApiResponse
{
    public static function success($result, string|null $message = null): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
        ];

        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response, Response::HTTP_OK);
    }

    public static function error(Exception $exception, $errorCode = null): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $exception->getMessage(),
        ];

        // Определяем правильный HTTP статус код
        $httpCode = self::getHttpStatusCode($exception);

        return response()->json($response, $errorCode ?? $httpCode);
    }

    private static function getHttpStatusCode(Exception $exception): int
    {
        // Для QueryException используем 500
        if ($exception instanceof QueryException) {
            return Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        // Для других исключений проверяем код
        $code = $exception->getCode();

        // Если код в допустимом диапазоне HTTP статус кодов
        if ($code >= 100 && $code <= 599) {
            return $code;
        }

        // По умолчанию 500
        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
