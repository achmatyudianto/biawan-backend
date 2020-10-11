<?php

namespace App\Policies;

use App\User;
use App\Cage;
use Illuminate\Auth\Access\HandlesAuthorization;

class CagePolicy
{
    use HandlesAuthorization;
    
    public function update(User $user, Cage $cage)
    {
        return $user->ownsCage($cage);
    }
}
