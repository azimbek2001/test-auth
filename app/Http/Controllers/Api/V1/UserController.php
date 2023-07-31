<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Services\User\IUserService;
use Illuminate\Http\JsonResponse;

class UserController extends BaseApiController
{
    /**
     * @var IUserService
     */
    private IUserService $userService;

    /**
     * @param IUserService $userService
     */
    public function __construct(
        IUserService $userService,
    )
    {
        $this->userService = $userService;
    }

    /**
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        $serviceResponse = $this->userService->me();
        return $this->jsonServiceResponse($serviceResponse);
    }
}
