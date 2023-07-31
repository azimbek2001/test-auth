<?php
declare(strict_types=1);

namespace App\Services\Auth;

use App\Http\Dto\Auth\BaseAuthLoginDto;
use App\Services\ServiceResponse;

interface IAuthService
{
    /**
     * @param BaseAuthLoginDto $authLoginDto
     * @return ServiceResponse
     */
    public function login(BaseAuthLoginDto $authLoginDto): ServiceResponse;
}
