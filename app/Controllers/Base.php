<?php

namespace App\Controllers;

class Base extends BaseController
{
    public function index()
    {
        return view('homes');
    }

}