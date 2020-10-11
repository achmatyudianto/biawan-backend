<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Company;
use App\Cage;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'company_id', 'name', 'email', 'password', 'api_token', 'mobile_phone', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        $this->belongsTo(Company::class, 'company_id');
    }

    public function cages()
    {
        $this->hasMany(Cage::class);
    }

    public function ownsCage(Cage $cage)
    {
        return auth()->user()->company_id == $cage->company_id;
    }
}
