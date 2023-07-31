<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var User $this */
        $user = $this;
        return [
            'id' => $user->id,
            'full_name' => $user->full_name,
            'email' => $user->email,
            'organization' => new OrganizationResource($user->organization),
        ];
    }
}
