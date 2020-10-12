<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    public function toArray($request)
    {
        if ($this->avatar != null) {
            $imageURL = url('images', $this->avatar);
        } else {
            $imageURL = url('images/no-user-image.png');
        }

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'mobile_phone'  => (string)$this->mobile_phone,
            'avatar'        => $imageURL,
            'registered'    => $this->created_at->diffForHumans(),
            'company'       => [
                'id'            => $this->company->id,
                'company_name'  => $this->company->company_name,
                'address'       => (string)$this->company->address,  
            ],
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'token' => $this->api_token,
            ],
        ];
    }
}
