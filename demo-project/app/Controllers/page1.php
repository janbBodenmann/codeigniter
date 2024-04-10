<?php

namespace App\Controllers;

class page1 extends BaseController
{
    public function index(): string
    {   
        echo view('navbar');
        return view('page1');
    }
}
