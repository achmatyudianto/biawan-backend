<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Company;
use App\Cage;
use App\Animal;
use App\Cost;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id', 'company_id', 'name', 'email', 'password', 'api_token', 'mobile_phone', 'avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function cages()
    {
        return $this->hasMany(Cage::class, 'id');
    }

    public function animals()
    {
        return $this->hasMany(Animal::class, 'id');
    }

    public function costs()
    {
        return $this->hasMany(Cost::class, 'id');
    }

    public function ownsCage(Cage $cage)
    {
        return auth()->user()->company_id == $cage->company_id;
    }

    public function ownsAnimal(Animal $animal)
    {
        return auth()->user()->company_id == $animal->company_id;
    }

    public function ownsCost(Cost $cost)
    {
        return auth()->user()->company_id == $cost->company_id;
    }
}
