<?php

namespace App\Http\Resources\Tenders;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TenderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'links' => [
                'next' => $this->nextPageUrl(),
                'prev' => $this->previousPageUrl(),
                'path' => $this->path()
            ],
            'meta' => [
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'has_more_pages' => $this->hasMorePages(),
            ],
        ];
    }
}
