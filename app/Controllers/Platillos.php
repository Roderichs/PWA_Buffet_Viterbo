<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Platillo;
class Platillos extends Controller{
/*Método de index___________________________________________________________________________________*/
    public function index(){
        
        $platillo = new Platillo();
        $datos['platillos'] = $platillo->orderBy('id','ASC')->findAll();
        $datos['header'] = view('backend/template/header');
        $datos['footer'] = view('backend/template/footer');
        return view('backend/platillos/listar',$datos);
    }
/*Método de crear___________________________________________________________________________________*/
    public function crear(){
        
        $datos['header'] = view('backend/template/header');
        $datos['footer'] = view('backend/template/footer');
        return view('backend/platillos/crear',$datos);
    }
/*Método de guardar_________________________________________________________________________________*/
    public function guardar(){
        
        $platillo = new Platillo();
        $validacion = $this->validate([
            'nombre'=>'required|min_length[3]',
            'descripcion'=>'required|min_length[3]',
            'precio'=>'required|min_length[1]',
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);
        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();
        }

        if($imagen=$this->request->getFile('imagen')){
            $nuevoNombre=$imagen->getRandomName();
            $imagen->move('../public/uploads/',$nuevoNombre);
            $datos=[
                'nombre'=>$this->request->getVar('nombre'),
                'descripcion'=>$this->request->getVar('descripcion'),
                'precio'=>$this->request->getVar('precio'),
                'imagen'=>$nuevoNombre
            ];
            $platillo->insert($datos);
        }

        return $this->response->redirect(site_url('/listar'));
    }
/*Método de borrar__________________________________________________________________________________*/
    public function borrar($id=null){
        
        $platillo = new Platillo();
        $datosPlatillo=$platillo->where('id',$id)->first();
        $ruta=('../public/uploads/'.$datosPlatillo['imagen']);
        unlink($ruta);
        $platillo->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/listar'));
    }
/*Método de editar__________________________________________________________________________________*/
    public function editar($id=null){
        //print_r($id);
        $platillo = new Platillo();
        $datos['platillo']=$platillo->where('id',$id)->first();
        $datos['header'] = view('backend/template/header');
        $datos['footer'] = view('backend/template/footer');
        return view('backend/platillos/editar',$datos);
    }
/*Método de actualizar______________________________________________________________________________*/
    public function actualizar(){

        $platillo = new Platillo();
        $datos=[
            'nombre'=>$this->request->getVar('nombre'),
            'descripcion'=>$this->request->getVar('descripcion'),
            'precio'=>$this->request->getVar('precio')
        ];
        $id=$this->request->getVar('id');
        $validacion = $this->validate([
            'nombre'=>'required|min_length[3]',
            'descripcion'=>'required|min_length[3]',
            'precio'=>'required|min_length[1]',
        ]);
        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();
        }

        $platillo->update($id,$datos);
        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);
        
        if($validacion){
            if($imagen=$this->request->getFile('imagen')){
                $datosPlatillo=$platillo->where('id',$id)->first();
                $ruta=('../public/uploads/'.$datosPlatillo['imagen']);
                    unlink($ruta);
                $nuevoNombre=$imagen->getRandomName();
                $imagen->move('../public/uploads/',$nuevoNombre);
                $datos=[
                    'imagen'=>$nuevoNombre
                ];
                $platillo->update($id,$datos);
            } 
        }

        return $this->response->redirect(site_url('/listar'));

    }
}