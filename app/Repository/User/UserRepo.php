<?php

declare (strict_types = 1);

namespace App\Repository\User;

if (!interface_exists('UserRepo')) {
    interface UserRepo
    {
        /**
         * Update user profile
         *
         * @param  string $id 
         * @param  array $data
         * @return bool
         */
        public function update(string $id, array $data): bool;
    }
}
