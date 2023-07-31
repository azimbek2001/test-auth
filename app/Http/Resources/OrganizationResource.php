<?php

namespace App\Http\Resources;

use App\Models\Organization\Organization;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Organization $this */
        $organization = $this;
        return [
            'id' => $organization->id,
            'name' => $organization->name,
            'inn' => $organization->inn,
        ];
    }
}
