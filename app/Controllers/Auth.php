<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;

class Auth extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }

    public function index()
    {
        return view('auth/login');
    }

    public function registro(){
        return view('auth/registro');
    }
/*Método de guardar_________________________________________________________________________________*/
    public function guardar(){
    
        /*
        $validation = $this->validate([
            'nombre'=>'required',
            'correo'=>'required|valid_email|is_unique[usuarios.correo]',
            'password'=>'required|min_length[5]|max_length[12]',
            'cpassword'=>'required|min_length[5]|max_length[12]|matches[password]'
        ]);
        */
        $validation = $this->validate([
            'nombre'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Tu nombre es necesario'
                ]
                ],
            'correo'=>[
                'rules'=>'required|valid_email|is_unique[usuarios.correo]',
                'errors'=>[
                    'required'=>'El correo es necesario',
                    'valid_email'=>'Tu debes ingresar un correo valido',
                    'is_unique'=>'El correo ya existe'
                ]
                ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors'=>[
                    'required'=>'La contraseña es necesaria',
                    'min_length'=>'La contraseña debe tener al menos 5 caracteres de longitud',
                    'max_length'=>'la contraseña no debe tener más de 12 caracteres de longitud'
                ]
                ],
            'cpassword'=>[
                'rules'=>'required|min_length[5]|max_length[12]|matches[password]',
                'errors'=>[
                    'required'=>'Confirma la contraseña es necesario',
                    'min_length'=>'La contraseña debe tener al menos 5 caracteres de longitud',
                    'max_length'=>'la contraseña no debe tener más de 12 caracteres de longitud',
                    'matches'=>'confirmar contraseña no coincide con la contraseña'
                ]
            ]
        ]);


        if (!$validation) {
            return view('auth/registro',['validation'=>$this->validator]);
        }else{
            $nombre = $this->request->getPost('nombre');
            $correo = $this->request->getPost('correo');
            $password = $this->request->getPost('password');
            
            $values = [
                'nombre'=>$nombre,
                'correo'=>$correo,
                'password'=>Hash::make($password),
            ];

            $usuario = new \App\Models\Usuario();
            $query = $usuario->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail','something went wrong');
                //return redirect()->to('registro')->with('fail','something went wrong');
            }else{
                //return redirect()->to('auth/registro')->with('success','You are now registered succesfully');
                $last_id = $usuario->insertID();/*Esta es la última identificación insertada*/
                session()->set('loggedUser',$last_id);
                return redirect()->to('/dashboard');
            }
        }
    }

    function check(){
        
        $validation = $this->validate([
            'correo'=>[
                'rules'=>'required|valid_email|is_not_unique[usuarios.correo]',
                'errors'=>[
                    'required'=>'El correo es necesario',
                    'valid_email'=>'Tu debes ingresar un correo valido',
                    'is_not_unique'=>'El correo no se encuntra registrado'
                ]
                ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors'=>[
                    'required'=>'La contraseña es necesaria',
                    'min_length'=>'La contraseña debe tener al menos 5 caracteres de longitud',
                    'max_length'=>'la contraseña no debe tener más de 12 caracteres de longitud'
                ]
                ],    
        ]);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        }else{
            $correo = $this->request->getPost('correo');
            $password = $this->request->getPost('password');
            $usuario = new \App\Models\Usuario();
            $user_info = $usuario->where('correo',$correo)->first();
            $check_password = Hash::check($password, $user_info['password']);

            if(!$check_password){
                session()->setFlashdata('fail', 'incorrect password');
                return redirect()->to('/auth')->withInput();
            }else{
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/dashboard');
            }
        }

    }

    function logout(){
        if (session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail','You are logged out!');
        }
    }

}