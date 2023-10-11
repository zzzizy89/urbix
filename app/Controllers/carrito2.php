<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\Carritos;

class Carrito2 extends Controller{
    public function index()
    {
        $car = new Carritos();

        $datos['carritos'] = $car->orderBy('id_carrito', 'ASC')->findAll();

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');

      
        $vistaCarrito = view('main/form/carrito2', $datos);

      
        return $vistaCarrito;
    }
    public function eliminarcar($id=null){

        $car = new Carritos();
        $datosCar = $car->where('id_carrito',$id)->first();

        $ruta=('../public/uploads/'.$datosCar['imagen']);
        unlink($ruta);

        $car->where('id_carrito',$id)->delete($id);

        return $this->response->redirect(site_url('/carrito2'));

    }
}