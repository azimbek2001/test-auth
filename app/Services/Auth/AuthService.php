<?php
declare(strict_types=1);

namespace App\Services\Auth;

use App\Http\Dto\Auth\BaseAuthLoginDto;
use App\Models\User\User;
use App\Repositories\User\IUserRepository;
use App\Services\Service;
use App\Services\ServiceResponse;

class AuthService extends Service implements IAuthService
{
    /**
     * @var IUserRepository
     */
    private IUserRepository $userRepository;

    /**
     * @param IUserRepository $userRepository
     */
    public function __construct(
        IUserRepository $userRepository,
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritDoc
     */
    public function login(BaseAuthLoginDto $authLoginDto): ServiceResponse
    {
        $user = $this->userRepository->getUserByEmail($authLoginDto->email);

        if (!User::login($authLoginDto)) {
            return $this->createServiceErrorResponse('Логин или пароль не верны', 401);
        }

        $token = $user->createToken('test')->plainTextToken;

        return $this->createResponse([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
