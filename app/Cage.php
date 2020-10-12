<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\User;
use App\Animal;

class Cage extends Model
{
    protected $fillable = [
        'id', 'company_id', 'cage_name', 'created_by', 'status',
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'company_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'created_by');
    }

    public function animals()
    {
        return $this->hasMany(Animal::class, 'id');
    }
}
