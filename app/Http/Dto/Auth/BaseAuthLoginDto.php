<?php
declare(strict_types=1);

namespace App\Http\Dto\Auth;

abstract class BaseAuthLoginDto extends BaseAuthDto
{
    /**
     * @var string
     */
    public string $email;
    /**
     * @var string
     */
    public string $password;

    abstract function getCredentials(): array;
}
