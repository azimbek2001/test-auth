<?php
declare(strict_types=1);

namespace App\Models\User;

class UserFullName
{
    /**
     * @var string
     */
    public string $first_name;
    /**
     * @var string
     */
    public string $last_name;
    /**
     * @var string|null
     */
    public ?string $middle_name = null;

    /**
     * @param string $first_name
     * @param string $last_name
     * @param string|null $middle_name
     */
    public function __construct(string $first_name, string $last_name, ?string $middle_name = null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->middle_name = $middle_name;
    }
}
