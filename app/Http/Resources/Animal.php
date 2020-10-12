<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Animal extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'animal'        => $this->animal,
            'animal_name'   => $this->animal_name,
            'buy'           => (double)$this->buy,
            'sold'          => (double)$this->sold,
            'status_sold'   => $this->status_sold,
            'status'        => $this->status,
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
