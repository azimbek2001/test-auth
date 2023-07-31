<?php
declare(strict_types=1);

namespace App\Repositories\User;

use App\Exceptions\Repository\ModelNotFoundException;
use App\Models\User\User;

class DbUserRepository implements IUserRepository
{

    /**
     * @inheritDoc
     */
    public function getUserByEmail(string $email): User
    {
        $user = User::where('email', $email)->first();

        if(!$user){
            throw new ModelNotFoundException('Пользователь не найден.');
        }

        return $user;
    }
}
