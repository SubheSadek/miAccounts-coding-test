<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountHeadTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'account_head_id' => $this->account_head_id,
            'type' => $this->type,
            'total' => (int) $this->total,
            'parent' => new AccountHeadTableResource($this->parent),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
