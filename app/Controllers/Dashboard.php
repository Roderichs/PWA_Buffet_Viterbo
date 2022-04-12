<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $usuario = new \App\Models\Usuario();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usuario->find($loggedUserID);
        $data = [
            'title'=>'Dashboard',
            'userInfo'=>$userInfo
        ];
        return view('backend/index', $data);
    }

    function profile(){
        $usuario = new \App\Models\Usuario();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usuario->find($loggedUserID);
        $data = [
            'title'=>'Profile',
            'userInfo'=>$userInfo
        ];
        return view('backend/profile', $data);
    }
}