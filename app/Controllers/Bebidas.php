<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Bebida;
class Bebidas extends Controller{
/*Método de index___________________________________________________________________________________*/
    public function index1(){
        
        $bebida = new Bebida();
        $datos['bebidas'] = $bebida->orderBy('id','ASC')->findAll();
        $datos['header'] = view('backend/template/header');
        $datos['footer'] = view('backend/template/footer');
        return view('backend/bebidas/listar1',$datos);
    }
/*Método de crear___________________________________________________________________________________*/
    public function crear1(){
        
        $datos['header'] = view('backend/template/header');
        $datos['footer'] = view('backend/template/footer');
        return view('backend/bebidas/crear1',$datos);
    }
/*Método de guardar_________________________________________________________________________________*/
    public function guardar1(){
        
        $bebida = new Bebida();
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
            $bebida->insert($datos);
        }

        return $this->response->redirect(site_url('/listar1'));
    }
/*Método de borrar__________________________________________________________________________________*/
    public function borrar1($id=null){
        
        $bebida = new Bebida();
        $datosBebida=$bebida->where('id',$id)->first();
        $ruta=('../public/uploads/'.$datosBebida['imagen']);
        unlink($ruta);
        $bebida->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/listar1'));
    }
/*Método de editar__________________________________________________________________________________*/
    public function editar1($id=null){
        //print_r($id);
        $bebida = new Bebida();
        $datos['bebida']=$bebida->where('id',$id)->first();
        $datos['header'] = view('backend/template/header');
        $datos['footer'] = view('backend/template/footer');
        return view('backend/bebidas/editar1',$datos);
    }
/*Método de actualizar______________________________________________________________________________*/
    public function actualizar1(){

        $bebida = new Bebida();
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

        $bebida->update($id,$datos);
        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);
        
        if($validacion){
            if($imagen=$this->request->getFile('imagen')){
                $datosBebida=$bebida->where('id',$id)->first();
                $ruta=('../public/uploads/'.$datosBebida['imagen']);
                    unlink($ruta);
                $nuevoNombre=$imagen->getRandomName();
                $imagen->move('../public/uploads/',$nuevoNombre);
                $datos=[
                    'imagen'=>$nuevoNombre
                ];
                $bebida->update($id,$datos);
            } 
        }

        return $this->response->redirect(site_url('/listar1'));

    }
}