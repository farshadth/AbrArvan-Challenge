<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function get(string $phone): User
    {
        return User::query()->wherePhone($phone)->first();
    }
}
