<?php

namespace App\Policies;

use App\Models\Guide;
use App\Models\User;

class GuidePolicy
{
    /**
     * Semua role boleh lihat list
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    /**
     * Semua role boleh lihat detail
     */
    public function view(User $user, Guide $guide): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    /**
     * Admin & Editor boleh create
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    /**
     * Admin & Editor boleh edit
     */
    public function update(User $user, Guide $guide): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    /**
     * ❌ HANYA ADMIN BOLEH DELETE
     */
    public function delete(User $user, Guide $guide): bool
    {
        return $user->role === 'admin';
    }
}
