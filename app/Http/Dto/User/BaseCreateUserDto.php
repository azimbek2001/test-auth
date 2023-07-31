<?php
declare(strict_types=1);

namespace App\Http\Dto\User;

class BaseCreateUserDto extends BaseUserDto
{
    public string $email;
    public string $password;
    public string $first_name;
    public string $last_name;
    public ?string $middle_name = null;
    public int $organization_id;
}
