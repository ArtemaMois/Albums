<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class AuthController extends Controller
{
    public function index(): void
    {
        $this->view('/account/login');
    }

    public function login()
    {
        $validate = $this->request()->validate(
            [
                'email' => ['required'],
                'password' => ['required']
            ]
        );
        $check = $this->auth()->attempt($this->request()->input('email'), $this->request()->input('password'));
        if(!$validate || !$check)
        {
            $this->session()->set('login', 'Неверный email или пароль');
            return $this->redirectTo('/login');
        }

        $this->redirectTo('/');

    }

    public function logout()
    {
        $this->auth()->logout();
        $this->redirectTo('/login');
    }
}
