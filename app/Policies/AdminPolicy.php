<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    public function view(User $user, User $userModel): bool
    {
        return $userModel->role === 'admin';
    }
}
