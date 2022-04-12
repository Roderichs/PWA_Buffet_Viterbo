<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Comentario;
class Comentarios extends Controller{
/*Método de index___________________________________________________________________________________*/
    public function index2(){
        
        $comentario = new Comentario();
        $datos['comentarios'] = $comentario->orderBy('id','ASC')->findAll();
        $datos['header'] = view('backend/template/header');
        $datos['footer'] = view('backend/template/footer');

        return view('backend/comentarios/listar3',$datos);
    }

/*Método de guardar_________________________________________________________________________________*/
    public function guardarC(){
        
        $comentario = new Comentario();
        $validacion = $this->validate([
            'nombre'=>'required|min_length[3]',
            'correo'=>'required|min_length[3]',
            'mensaje'=>'required|min_length[3]',
        ]);
        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();
        }

        $datos=[
            'nombre'=>$this->request->getVar('nombre'),
            'correo'=>$this->request->getVar('correo'),
            'comentario'=>$this->request->getVar('mensaje'),
        ];
        $comentario->insert($datos);

        return $this->response->redirect(site_url('/'));
    }
   
/*Método de borrar__________________________________________________________________________________*/
    public function borrarC($id=null){
            
        $comentario = new Comentario();
        $datoscomentario = $comentario->where('id',$id)->first();

        $comentario->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/listar3'));
    }
}