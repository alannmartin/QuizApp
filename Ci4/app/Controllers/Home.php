<?php

namespace App\Controllers;

class Home extends BaseController
{

    protected \CodeIgniter\Session\Session $session;

    function __construct()
    {
        helper(['form','url','file','array','text']);
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(): string
    {
        $data['title'] = 'Online Quiz Project';

        return view('partials/header', $data)
            . view('pages/splash');
            //. view('partials/footer');
    }

    //--------------------------------------------------------------------




}
