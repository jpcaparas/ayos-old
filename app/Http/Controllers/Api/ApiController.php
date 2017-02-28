<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use Flugg\Responder\Responder;
use Flugg\Responder\Traits\RespondsWithJson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiController extends BaseController
{
    use RespondsWithJson;

    /**
     * @param null $data
     * @param null $statusCode
     * @param array $meta
     * @return Response|JsonResponse
     */
    public function response($data = null, $statusCode = null, array $meta = []): JsonResponse
    {
        return $this->successResponse($data, $statusCode, $meta);
    }

    /**
     * Generate an error JSON response.
     *
     * @param  string|null $errorCode
     * @param  int|null    $statusCode
     * @param  mixed       $message
     * @return Response|JsonResponse
     */
    public function errorResponse(string $errorCode = null, int $statusCode = null, $message = null): JsonResponse
    {
        return app(Responder::class)->error($errorCode, $statusCode, $message);
    }
}
