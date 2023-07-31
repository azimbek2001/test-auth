<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\BaseApiController;
use App\Http\Dto\Auth\AuthLoginDto;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\IAuthService;
use Illuminate\Http\JsonResponse;

class LoginController extends BaseApiController
{
    /**
     * @var IAuthService
     */
    private IAuthService $authService;

    /**
     * @param IAuthService $authService
     */
    public function __construct(
        IAuthService $authService,
    )
    {
        $this->authService = $authService;
    }

    /**
     * @param LoginRequest $loginRequest
     * @return JsonResponse
     */
    public function login(LoginRequest $loginRequest): JsonResponse
    {
        $loginDto = AuthLoginDto::fromRequest($loginRequest);
        $serviceResponse = $this->authService->login($loginDto);

        return $this->jsonServiceResponse($serviceResponse);
    }
}
