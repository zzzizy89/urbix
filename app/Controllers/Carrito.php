<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto;
use App\Models\Carritos;

class Carrito extends Controller
{
    public function index()
    {
        $producto = new Producto();

        $datos['productos'] = $producto->obtenertodoslosprod();

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');

        // Cargamos la vista "carrito.php" con los mismos datos
        $vistaCarrito = view('main/form/carrito', $datos);

        // Devolvemos la vista
        return $vistaCarrito;
    }
    public function guardar()
{
    // Obtener los datos del producto desde la segunda vista
    $id = $this->request->getVar('id_producto');
    $cantidad = $this->request->getVar('cantidad');

    
    // Obtener id_user desde la sesión
    $id_user = session('user')->id_user;

    // Crear una instancia del modelo que representa el carrito
    $carrito = new Carritos();
    
    // Llama al método del modelo para verificar si el producto ya está en el carrito
    $producto_en_carrito = $carrito->verificarProductoEnCarrito($id, $id_user);

 
    if ($producto_en_carrito) {
        // Si el producto ya está en el carrito, actualizar la cantidad y recalcular el total
        $nuevaCantidad = $producto_en_carrito['cantidad'] + $cantidad;


        // Si el producto ya está en el carrito, actualizar la cantidad
        $carrito->actualizarCantidadEnCarrito($producto_en_carrito['id_carrito'], $nuevaCantidad);        
    } else {
        // Si el producto no está en el carrito, agregar uno nuevo con la cantidad
        $datos = [
            'id_user' => $id_user,
            'id_producto' => $id,
            'cantidad' => $cantidad,
        ];

        // Insertar nuevo producto en el carrito
        $carrito->insertardatos($datos);
    }

    return redirect()->to('carrito');//test
}

    