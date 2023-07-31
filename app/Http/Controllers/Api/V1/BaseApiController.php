<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Responses\HttpResponse;
use App\Services\ServiceResponse;
use Illuminate\Http\JsonResponse;

class BaseApiController extends Controller
{
    /**
     * @param ServiceResponse $serviceResponse
     * @return JsonResponse
     */
    protected final function jsonServiceResponse(ServiceResponse $serviceResponse): JsonResponse
    {
        if ($serviceResponse->isFailed()) {
            return $this->errorServiceResponse($serviceResponse);
        }

        return $this->successServiceResponse($serviceResponse);
    }

    /**
     * @param ServiceResponse $serviceResponse
     * @return JsonResponse
     */
    private function errorServiceResponse(ServiceResponse $serviceResponse): JsonResponse
    {
        $error = $serviceResponse->getServiceError();
        return HttpResponse::jsonError($error->getMessage(), $serviceResponse->getResult() ?? [], $error->getCode());
    }

    /**
     * @param ServiceResponse $serviceResponse
     * @return JsonResponse
     */
    private function successServiceResponse(ServiceResponse $serviceResponse): JsonResponse
    {
        return HttpResponse::jsonSuccess($serviceResponse->getResult());
    }
}
