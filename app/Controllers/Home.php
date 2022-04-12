<?php

namespace App\Controllers;
use App\Models\Platillo;
use App\Models\Comentario;
use App\Models\Bebida;


class Home extends BaseController
{
    public function index()
    {
        $platillos = new Platillo();
        $bebidas = new Bebida();

        $datos['platillos'] = $platillos->orderBy('id','ASC')->findAll();
        $datos['bebidas'] = $bebidas->orderBy('id','ASC')->findAll();
        
        return view('homes', $datos);
    }
}