<?php

namespace App\AppTraits;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

trait Responses
{
    /**
     * @param string $messenge
     * @return JsonResponse
     */
    protected function success(
        string $messenge
    ): JsonResponse {
        return response()->json([
            'success' => 'success',
            'messenge' => $messenge,
        ], Response::HTTP_OK);
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    protected function successWithArgs(
        $data
    ): JsonResponse {
        return response()->json(
            $data,
            Response::HTTP_OK
        );
    }

    /**
     * @param string $messenge
     * @return JsonResponse
     */
    protected function created(
        string $messenge
    ): JsonResponse {
        return response()->json([
            'status' => 'success',
            'messenge' => $messenge,
        ], Response::HTTP_CREATED);
    }

    /**
     * @param string $token
     * @return JsonResponse
     */
    protected function respondWithToken(
        string $token
    ): JsonResponse {
        return response()->json([
            'status' => 'success',
            'user' => auth('api')->user(),
            'authorisation' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60,
            ]
        ], Response::HTTP_OK);
    }

    /**
     * @param array $user
     * @param $token
     * @return JsonResponse
     */
    protected function respondWithTokenRegister(
        array $user,
        $token
    ): JsonResponse {
        return response()->json([
            'status' => 'success',
            'messenge' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'access_token' => $token,
                'token_type' => 'bearer',
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * @return JsonResponse
     */
    protected function unauthorized(): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'messenge' => 'Unauthorized',
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @param string $messenge
     * @return JsonResponse
     */
    protected function notFound(
        string $messenge
    ): JsonResponse {
        return response()->json([
            'messenge' => $messenge,
        ], Response::HTTP_NOT_FOUND);
    }
}
