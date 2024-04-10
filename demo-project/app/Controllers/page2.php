<?php

namespace App\Controllers;

class page2 extends BaseController
{
    public function index(): string
    {
        echo view('navbar');
        return view('page2');
    }
}
