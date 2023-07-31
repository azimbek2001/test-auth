<?php
declare(strict_types=1);

namespace App\Services\User;

use App\Services\ServiceResponse;

interface IUserService
{
    /**
     * @return ServiceResponse
     */
    public function me(): ServiceResponse;
}
