<?php

namespace App\AppTraits;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

trait Responses
{
    /**
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    protected function success(
        string $messenger,
        int $statusCode = Response::HTTP_OK
    ): JsonResponse {
        return response()->json([
            'messenger' => $messenger,
        ], $statusCode);
    }

    /**
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    protected function successWithArgs(
        $args,
        int $statusCode = Response::HTTP_OK
    ): JsonResponse {
        return response()->json($args, $statusCode);
    }

    /**
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    protected function failure(
        string $messenger = 'Erro',
        int $statusCode = Response::HTTP_BAD_REQUEST
    ): JsonResponse {
        return response()->json([
            'messenger' => $messenger,
        ], $statusCode);
    }
}
