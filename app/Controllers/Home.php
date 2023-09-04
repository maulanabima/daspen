<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    Public function dashboard(): string
    {
        $session = session();
        $tt = $session->get('name');
        $data=[
            'title' => 'Dashboard',
            'name' => $tt
        ];
        return view('pages/dashboard', $data);
    }
}
