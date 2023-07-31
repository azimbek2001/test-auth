<?php
declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User\User;

interface IUserRepository
{
    /**
     * @param string $email
     * @return User
     */
    public function getUserByEmail(string $email): User;
}
