<?php

namespace App\Repositories;


class WalletRepository
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get(string $phone): int
    {
        $user = $this->userRepository->get($phone);

        return $user->wallet->balance ?? 0;
    }
}
