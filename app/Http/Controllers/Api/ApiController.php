<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use Flugg\Responder\Traits\RespondsWithJson;
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
}
