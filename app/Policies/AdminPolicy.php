<?php

namespace App\Policies;

use App\Models\User;

final class AdminPolicy
{
    public function view(User $user, User $userModel): bool
    {
        return $userModel->role === 'admin';
    }
}
