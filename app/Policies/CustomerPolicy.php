<?php

namespace App\Policies;

use App\Customer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Customer $customer)
    {
        return $user->id === $customer->user_id;
    }
}
