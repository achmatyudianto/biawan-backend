<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cage extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'cage_name'     => $this->cage_name,
            'status'        => $this->status,
            'created_at'    => $this->created_at->diffForHumans(),
            'created_by'    => [
                'id'    => $this->user->id,
                'name'  => $this->user->name,
            ],
        ];
    }
}
