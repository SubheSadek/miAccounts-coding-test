<?php

//*******************Response Modifier Start************************/

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

function withSuccess(mixed $data = '', string $message = '', int $status = 200): JsonResponse
{
    return customResponse($data, true, $status, $message);
}

function withSuccessResourceList(ResourceCollection $data, string $message = '', int $status = 200): JsonResponse
{
    return customResponse($data->response()->getData(), true, $status, $message);
}

function customResponse(mixed $data, string $success, int $status, string $message): JsonResponse
{
    return response()->json([
        'json_data' => $data,
        'success' => (bool) $success,
        'status' => (int) $status,
        'message' => (string) $message,
    ], $status);
}

//*******************Response Modifier End************************/
