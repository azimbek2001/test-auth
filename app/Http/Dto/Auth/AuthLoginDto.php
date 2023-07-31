<?php
declare(strict_types=1);

namespace App\Http\Dto\Auth;

use App\Utils\Columns\UserColumns;

class AuthLoginDto extends BaseAuthLoginDto
{

    /**
     * @return array
     */
    function getCredentials(): array
    {
        return [
            UserColumns::EMAIL_COLUMN => $this->email,
            UserColumns::PASSWORD_COLUMN => $this->password,
        ];
    }
}
