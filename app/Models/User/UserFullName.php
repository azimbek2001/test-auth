<?php
declare(strict_types=1);

namespace App\Models\User;

class UserFullName
{
    public string $first_name;
    public string $last_name;
    public ?string $middle_name = null;

    public function __construct(string $first_name, string $last_name, ?string $middle_name = null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->middle_name = $middle_name;
    }
}
