<?php

namespace Growats\OkNicLoginSecurity\Policies;

use App\Models\User;

class RolePolicy
{
    public function update(User $user, User $model)
    {
        return $user->hasRole('admin');
    }
}
