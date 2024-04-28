<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return $this->view('/account/register');
    }

    public function store()
    {
        $validated = $this->request()->validate(
            [
                'name' => ['required', 'min:2'],
                'email' => ['required', 'min:5', 'email'],
                'password' => ['required', 'min:6'],
            ]
        );

        if (!$validated) {
            foreach ($this->request->errors() as $field => $error) {
                $this->session->set($field, $error);
            }
            return $this->redirect('/register');
        }

        if (!$this->database()->insert('users', [
            'name' => $this->request()->input('name'),
            'email' => $this->request()->input('email'),
            'password' => password_hash($this->request()->input('password'), PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d\TH:i:s\Z", time())
        ])) {
            $this->redirect('/register');
        };

        $this->redirect('/login');
    }
}
