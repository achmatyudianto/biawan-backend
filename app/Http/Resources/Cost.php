<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cost extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'cost'          => (double)$this->cost,
            'note'          => (string)$this->note,
            'created_at'    => $this->created_at->diffForHumans(),
            'animal'        => [
                'id'            => $this->animal->id,
                'animal'        => $this->animal->animal,
                'animal_name'   => $this->animal->animal_name,
            ],
            'company'       => [
                'id'            => $this->company->id,
                'company_name'  => $this->company->company_name,
                'address'       => (string)$this->company->address,
            ],
            'created_by'    => [
                'id'    => $this->user->id,
                'name'  => $this->user->name,
            ],
        ];
    }
}
