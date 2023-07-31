<?php
declare(strict_types=1);

namespace App\Models\Organization;

use App\Models\BaseModel;
use App\Utils\Columns\OrganizationColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $inn
 * @property string $name
 */
class Organization extends BaseModel
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        OrganizationColumns::INN_COLUMN,
        OrganizationColumns::NAME_COLUMN,
    ];
}
