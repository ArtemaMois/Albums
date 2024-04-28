<?php 

namespace App\Kernel\Auth;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Session\SessionInterface;

class Auth implements AuthInterface
{


    public function __construct(
        private DatabaseInterface $database,
        private SessionInterface $session
    )
    {

    }

    public function attempt($email, $password): bool
    {
        $user = $this->database->first('users', [
            'email' => $email,
        ]);
        if(!$user){
            return false;
        }

        if(!password_verify($password, $user['password'])){
            return false;
        }
        $this->session->set('user', $user['id']);
        return true;
    }

    public function logout()
    {
        $this->session->remove('user');
    }

    public function check(): bool
    {
        return $this->session->has('user');
    }

    public function user(): ?User
    {
        if(!$this->check()){
            return null;
        }
        $user = $this->database->first('users', [
            'id' => $this->session->get('user')
        ]);
        if($user)
        {
            return new User($user['id'], $user['email'], $user['name'], $user['password']);
        }

        return null;

    }
}
