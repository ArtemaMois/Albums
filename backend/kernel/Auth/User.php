<?php 

namespace App\Kernel\Auth;

class User
{


    public function __construct(
        private int $id,
        private string $email,
        private string $name,
        private string $password,
    )
    {

    }

    public function id()
    {
        return $this->id;
    }

    public function email()
    {
        return $this->email;
    }

    public function name()
    {
        return $this->name;
    }

    public function created_at()
    {
        return $this->password;
    }
}