<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Company;

class User extends JsonResource
{
    public function toArray($request)
    {
        if ($this->avatar != null) {
            $imageURL = url('images', $this->avatar);
        } else {
            $imageURL = url('images/no-user-image.png');
        }

        $company = Company::find($this->company_id);
        $company = [
            'id'            => $company->id,
            'company_name'  => $company->company_name,
            'address'       => (string)$company->address,
        ];

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'mobile_phone'  => (string)$this->mobile_phone,
            'avatar'        => $imageURL,
            'registered'    => $this->created_at->diffForHumans(),
            'company'       => $company,
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
