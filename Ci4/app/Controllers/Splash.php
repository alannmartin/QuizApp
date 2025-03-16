<?php

namespace App\Controllers;
use CodeIgniter\Session\Session;
use Config\Services;


class Splash extends BaseController
{

    protected Session $session;

    function __construct()
    {
        helper(['form','url','file','array','text']);
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(): string
    {
        $this->session = Services::session();
        $this->session->destroy();
        return view('pages/splash');
    }

} //end of class
