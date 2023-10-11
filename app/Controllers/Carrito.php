<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Teclado;
use App\Models\Carritos;

class Carrito extends Controller
{
    public function index()
    {
        $teclado = new Teclado();

        $datos['teclados'] = $teclado->orderBy('id', 'ASC')->findAll();

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');

        // Cargamos la vista "carrito.php" con los mismos datos
        $vistaCarrito = view('main/form/carrito', $datos);

        // Devolvemos la vista
        return $vistaCarrito;
    }
    public function guardar(){
    // Obtener los datos del producto desde la segunda vista
        $nombre = $_POST['nombre']; 
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];

    // Crear una instancia del modelo que representa el carrito
        $carrito = new Carritos();
    
    // Crear una instancia del modelo que representa el producto
        $datos=[
            'nombre'=>$nombre= $this->request->getVar('nombre'),
            'precio'=>$precio=$this->request->getVar('precio'),
            'imagen'=>$imagen=$this->request->getVar('imagen')
        ];


        $carrito->insert($datos);
        return redirect()->to('carrito');
    }
}