<?php
declare(strict_types=1);

namespace App\Models\User;

use App\Http\Dto\Auth\BaseAuthLoginDto;
use App\Http\Dto\User\BaseCreateUserDto;
use App\Models\BaseAuthenticatable;
use App\Models\Organization\Organization;
use App\Utils\Columns\UserColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $email
 * @property string password
 * @property int $organization_id
 *
 * @property UserFullName $full_name
 * @property Organization $organization
 */
class User extends BaseAuthenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        UserColumns::EMAIL_COLUMN,
        UserColumns::FULL_NAME_COLUMN,
        UserColumns::PASSWORD_COLUMN,
        UserColumns::REMEMBER_TOKEN_COLUMN,
        UserColumns::ORGANIZATION_ID,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        UserColumns::PASSWORD_COLUMN,
        UserColumns::REMEMBER_TOKEN_COLUMN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        UserColumns::PASSWORD_COLUMN => 'hashed',
    ];

    /**
     * @param BaseAuthLoginDto $authLoginDto
     * @return bool
     */
    public static function login(BaseAuthLoginDto $authLoginDto): bool
    {
        return Auth::attempt($authLoginDto->getCredentials());
    }

    /**
     * @param string $password
     * @return void
     */
    public function setPasswordAttribute(string $password): void
    {
        $this->attributes[UserColumns::PASSWORD_COLUMN] = bcrypt($password);
    }

    /**
     * @param BaseCreateUserDto $userDto
     * @return static
     */
    public static function add(BaseCreateUserDto $userDto): static
    {
        $user = new static();
        $user->email = $userDto->email;
        $user->password = $userDto->password;
        $user->organization_id = $userDto->organization_id;

        $user->setFullName($userDto);
        return $user;
    }

    /**
     * @param BaseCreateUserDto $userDto
     * @return void
     */
    private function setFullName(BaseCreateUserDto $userDto): void
    {
        $this->full_name = new UserFullName($userDto->first_name, $userDto->last_name, $userDto->middle_name);
    }

    /**
     * @param $value
     * @return void
     */
    public function setFullNameAttribute($value): void
    {
        if ($value instanceof UserFullName) {
            $this->attributes[UserColumns::FULL_NAME_COLUMN] = json_encode($value);
        }
    }

    /**
     * @param string $value
     * @return UserFullName
     */
    public function getFullNameAttribute(string $value): UserFullName
    {
        $fullName = json_decode($value);
        return new UserFullName($fullName->first_name, $fullName->last_name, $fullName->middle_name);
    }

    /**
     * @return BelongsTo
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
