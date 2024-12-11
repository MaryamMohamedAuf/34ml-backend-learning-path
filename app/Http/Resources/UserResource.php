<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return parent::toArray($request);
       return [
           'type' => 'user',
           'id' =>$this->id,
            'Attributes'=>[
                'name' => $this->when(
                $request->routeIs('students.show'),
                 $this->name
            ),
            ]
           ];
    }
}
