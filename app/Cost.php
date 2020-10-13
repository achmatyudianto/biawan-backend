<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\Animal;
use App\User;

class Cost extends Model
{
    protected $fillable = [
        'id', 'company_id', 'animal_id', 'cost', 'note', 'created_by', 
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'company_id');
    }

    public function animal()
    {
    	return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'created_by');
    }
}
