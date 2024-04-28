<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class AlbumsController extends Controller
{

    public function index()
    {
        $this->view('/albums/add_album');
    }
    public function store()
    {
        $validation = $this->request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['min:10']
        ]);
        if (!$validation) {
            foreach ($this->request->errors() as $field => $error) {
                $this->session->set($field, $error);
            }
            $this->redirectTo('/albums/add');
        }
        if(is_bool($this->database()->insert('albums', [
            'name' => $this->request->input('name'),
            'description' => $this->request->input('description'),
            'created_at' => date("Y-m-d\TH:i:s\Z", time())
        ]))){
            
        };
    }
}
