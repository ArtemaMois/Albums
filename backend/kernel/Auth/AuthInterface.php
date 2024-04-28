<?php

namespace App\Kernel\Auth;

interface AuthInterface
{
    public function attempt($username, $password): bool;
    public function logout();

    public function check(): bool;

    public function user(): ?User;
}
