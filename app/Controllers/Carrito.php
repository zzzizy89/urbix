<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto;
use App\Models\Carritos;
use App\Models\Tipo;

class Carrito extends Controller
{
/*    en caso de usar la ruta sin parametros se declara como null 
      en caso de usar la ruta con parametros se declara $tipoActual 
*/
public function index($tipoActual = null) 
{
    $producto = new Producto();
    $tipo = new Tipo();

    $datos['productos'] = null;

    if ($tipoActual) {
        $datos['productos'] = $producto->obtenerProductosPorTipo($tipoActual);
    } else {
        $datos['productos'] = $producto->obtenertodoslosprod();
    }
    
    $datos['tipos'] = $tipo->tipoprod();
    $datos['tipo_actual'] = $tipoActual;  

    $datos['cabecera'] = view('templates/cabecera');
    $datos['pie'] = view('templates/piepagina');

    // Cargamos la vista "carrito.php" con los mismos datos
    $vistaCarrito = view('main/form/carrito', $datos);

    // Devolvemos la vista
    return $vistaCarrito;
}

/*   
    al usar el filtro de la vista se usa esta funcion 
    y se carga la vista con solo los productos del tipo
    seleccionado
*/
public function filtrarPorTipo($idTipo)
{
    $producto = new Producto();
    $tipo = new Tipo();

    $datos['productos'] = $producto->obtenerProductosPorTipo($idTipo);
    $datos['tipos'] = $tipo->tipoprod();
    $datos['tipo_actual'] = $idTipo;  // Agrega el tipo actual a los datos

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

    $tipoActual = $this->request->getPost('tipo_actual');
    if ($tipoActual) {
               /*
se usa la ruta carritop con el parametro para que al cargar el index
tenga el $tipoActual asi se mantiene la vista con los productos del tipo
al usar el boton de agregar al carrito
*/
return redirect()->to(base_url("carritop/$tipoActual"));
    } else {
    return redirect()->to('carrito');
    }

}
}
    