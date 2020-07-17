<?php

declare (strict_types = 1);

namespace App\Repository\User\Eloquent;

use App\Models\User;
use App\Repository\User\UserRepo;

class UserEloquent implements UserRepo
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Update user profile
     *
     * @param  string $id
     * @param  array  $data
     * @return bool
     */
    public function update(string $id, array $data): bool
    {
        $user = $this->user->findOrFail($id);
        return $user->update($data);
    }
}
