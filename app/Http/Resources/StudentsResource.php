<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);
        return [
            'id' =>$this->id,
            'Attributes'=>[
                'name' => $this->name,
            ],
            'relations'=>[
        'user_id' => $this->user_id,
    ],
            'links'=>[
                'self' => 'todo',
            ]
        ];
    }
}
