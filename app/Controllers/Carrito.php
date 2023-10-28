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

        $datos['productos'] = $producto->orderBy('id_producto', 'ASC')->findAll();

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
 
    
    // Obtener id_user desde la sesión
    $id_user = session('user')->id_user;

    // Crear una instancia del modelo que representa el carrito
    $carrito = new Carritos();
    
    // Verificar si el producto ya está en el carrito para el usuario actual
    $producto_en_carrito = $carrito->where('id_producto', $id)
                                   ->where('id_user', $id_user)
                                   ->first();

 
    if ($producto_en_carrito) {
        // Si el producto ya está en el carrito, actualizar la cantidad y recalcular el total
        $nuevaCantidad = $producto_en_carrito['cantidad'] + 1;


        // Si el producto ya está en el carrito, actualizar la cantidad
        $carrito->update($producto_en_carrito['id_carrito'], ['cantidad' => $nuevaCantidad]);
        
    } else {
        // Si el producto no está en el carrito, agregar uno nuevo con cantidad 1 
        $datos = [
            'id_user' => $id_user,
            'id_producto' => $id,
            'cantidad' => 1,
        ];

        // Insertar nuevo producto en el carrito
        $carrito->insert($datos);
    }

    return redirect()->to('carrito');
}

    
}