<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\teclado;
class Teclados extends Controller{

    public function index(){

        $user = session('user');
    
        if (!$user || $user->id_user < 1) {
            // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
            return redirect()->to('/login');
        }
    
        // El usuario ha iniciado sesión, verificar su rol
        $rol = $user->rol; 
    
        if ($rol == 1) {
            // Si el usuario tiene rol 1, cargar la vista listar
            $teclado = new Teclado();
            $datos['teclados'] = $teclado->orderBy('id_teclado', 'ASC')->findAll();
            $datos['cabecera'] = view('templates/cabecera');
            $datos['pie'] = view('templates/piepagina');
    
            return view('main/crud/listar', $datos);
        } else {
            // Si el usuario no tiene rol 1, redirigir a la página dashboard
            return redirect()->to('/dashboard');
        }
    }

    public function crear(){

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');
    
        return view('main/crud/crear', $datos); 
    }

    public function guardar(){

        $teclado = new Teclado();

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'precio' => 'required|numeric',
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
                'precio'=>$precio=$this->request->getVar('precio'),
                'imagen'=>$nuevoNombre
            ];
            $teclado->insert($datos);
        }

        return $this->response->redirect(site_url('/listar'));
    }

    public function eliminar($id=null){

        $teclado = new Teclado();
        $datosTeclado = $teclado->where('id_teclado',$id)->first();

        $ruta=('../public/uploads/'.$datosTeclado['imagen']);
        unlink($ruta);

        $teclado->where('id_teclado',$id)->delete($id);

        return $this->response->redirect(site_url('/listar'));

    }

    public function editar($id=null){



        $teclado = new Teclado();
        $datos['teclado'] = $teclado->where('id_teclado',$id)->first();

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');

        return view('main/crud/editar', $datos);

    }

    public function actualizar(){

        $teclado = new Teclado();
        $datos=[
            'nombre'=>$nombre= $this->request->getVar('nombre'),
            'precio'=>$nombre= $this->request->getVar('precio')            
        ];
        $id=$this->request->getVar('id_teclado');


        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'precio' => 'required|numeric',
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

            $datosTeclado = $teclado->where('id_teclado',$id)->first();

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