<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\Animal;
use App\User;

class Animal extends Model
{
    protected $fillable = [
        'id', 'company_id', 'cage_id', 'animal', 'animal_name', 'buy', 'sold', 'status_sold', 'status', 'created_by',
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'company_id');
    }

    public function cage()
    {
    	return $this->belongsTo(Animal::class, 'cage_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'created_by');
    }
}
