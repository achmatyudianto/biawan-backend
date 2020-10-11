<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
{
    public function toArray($request)
    {
        return [
            'company_name'  => $this->company_name,
            'address'       => $this->address,
        ];
    }
}
