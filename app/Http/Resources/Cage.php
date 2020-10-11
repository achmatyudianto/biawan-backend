<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class Cage extends JsonResource
{
    public function toArray($request)
    {
        $user = User::find($this->created_by);
        $user = [
            'id'    => $user->id,
            'name'  => $user->name,
        ];

        return [
            'id'            => $this->id,
            'cage_name'     => $this->cage_name,
            'status'        => $this->status,
            'created_at'    => $this->created_at->diffForHumans(),
            'created_by'    => $user,
        ];
    }
}
