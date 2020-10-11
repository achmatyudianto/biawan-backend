<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Cage;

class Company extends Model
{
    protected $fillable = [
        'company_name', 'address', 
    ];

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function cages()
    {
    	return $this->hasMany(Cage::class);
    }
}
