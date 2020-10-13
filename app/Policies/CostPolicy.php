<?php

namespace App\Policies;

use App\User;
use App\Cost;
use Illuminate\Auth\Access\HandlesAuthorization;

class CostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Cost $cost)
    {
        return $user->ownsCost($cost);
    }

    public function delete(User $user, Cost $cost)
    {
        return $user->ownsCost($cost);
    }
}
