<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

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
            'includes' =>  new UserResource($this->whenLoaded('user'))

            ];
    }
}
