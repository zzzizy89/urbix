<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\teclado;
class Teclados extends Controller{

    public function index(){

        $teclado = new Teclado();

        $datos['teclados'] = $teclado->orderBy('id', 'ASC')->findAll();

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');

        return view('main/crud/listar', $datos); 
    }

    public function crear(){

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');
    
        return view('crud/crear', $datos); 
    }

    public function guardar(){

        $teclado = new Teclado();

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,4096]',
            ],
        ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('mensaje', 'Verifique la información del formulario');
            return redirect()->back()->withInput();
        }

        if($imagen=$this->request->getFile('imagen')){
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../public/uploads', $nuevoNombre);

            $datos=[
                'nombre'=>$nombre= $this->request->getVar('nombre'),
                'imagen'=>$nuevoNombre
            ];
            $teclado->insert($datos);
        }

        return $this->response->redirect(site_url('/listar'));
    }

    public function eliminar($id=null){

        $teclado = new Teclado();
        $datosTeclado = $teclado->where('id',$id)->first();

        $ruta=('../public/uploads/'.$datosTeclado['imagen']);
        unlink($ruta);

        $teclado->where('id',$id)->delete($id);

        return $this->response->redirect(site_url('/listar'));

    }

    public function editar($id=null){



        $teclado = new Teclado();
        $datos['teclado'] = $teclado->where('id',$id)->first();

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');

        return view('crud/editar', $datos);

    }

    public function actualizar(){

        $teclado = new Teclado();
        $datos=[
            'nombre'=>$nombre= $this->request->getVar('nombre')
            
        ];
        $id=$this->request->getVar('id');


        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
          
        ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('mensaje', 'Verifique la información del formulario');
            return redirect()->back()->withInput();
        }


        $teclado->update($id,$datos);

        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,4096]',
            ],
        ]);

        if($validacion){
            
        if($imagen=$this->request->getFile('imagen')){

            $datosTeclado = $teclado->where('id',$id)->first();

            $ruta=('../public/uploads/'.$datosTeclado['imagen']);
            unlink($ruta);

            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../public/uploads', $nuevoNombre);

            $datos=['imagen'=>$nuevoNombre];
            $teclado->update($id,$datos);
        }

        }
        return $this->response->redirect(site_url('/listar'));
       
    }

    public function inicio(){

        return view('inicio/vista');
    }

    public function about(){

        return view('inicio/about');
    }
    
    
}