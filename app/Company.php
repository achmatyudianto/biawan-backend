<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Cage;
use App\Animal;

class Company extends Model
{
    protected $fillable = [
        'id', 'company_name', 'address',
    ];

    public function users()
    {
    	return $this->hasMany(User::class, 'id');
    }

    public function cages()
    {
    	return $this->hasMany(Cage::class, 'id');
    }

    public function animals()
    {
        return $this->hasMany(Animal::class, 'id');
    }
}
