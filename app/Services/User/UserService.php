<?php

namespace App\Services\User;

use App\Http\Resources\UserResource;
use App\Services\Service;
use App\Services\ServiceResponse;
use Illuminate\Support\Facades\Auth;

class UserService extends Service implements IUserService
{

    /**
     * @inheritDoc
     */
    public function me(): ServiceResponse
    {
        return $this->createResponse([
            'user' => new UserResource(Auth::user()),
        ]);
    }
}
