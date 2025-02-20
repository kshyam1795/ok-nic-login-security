<?php

namespace Growats\OkNicLoginSecurity\Policies;

use App\Models\User;

class PermissionPolicy
{
    public function assign(User $user)
    {
        return $user->hasRole('admin');
    }
}
