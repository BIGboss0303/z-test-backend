<?php

namespace App\Http\Resources\Tenders;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TenderResource extends JsonResource
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
            'status' => $this->status,
            'external_code' => $this->external_code,
            'number' => $this->number,
            'updated_at' => $this->updated_at

        ];
    }
}
