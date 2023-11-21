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
// Método para cargar la vista principal y gestionar los productos por tipo
public function index($tipoActual = null) 
{
    // Instanciamos los modelos de Producto y Tipo
    $producto = new Producto();
    $tipo = new Tipo();

    // Inicializamos el arreglo de datos
    $datos['productos'] = null;

    // Verificamos si se especificó un tipo de producto actual
    if ($tipoActual) {
        // Obtenemos los productos filtrados por el tipo actual
        $datos['productos'] = $producto->obtenerProductosPorTipo($tipoActual);
    } else {
        // Si no se especifica un tipo, obtenemos todos los productos
        $datos['productos'] = $producto->obtenertodoslosprod();
    }
    
    // Obtenemos los tipos de productos disponibles
    $datos['tipos'] = $tipo->tipoprod();
    // Almacenamos el tipo actual en los datos
    $datos['tipo_actual'] = $tipoActual;  

    // Cargamos las vistas de cabecera y pie de página
    $datos['cabecera'] = view('templates/cabecera');
    $datos['pie'] = view('templates/piepagina');

    // Cargamos la vista "carrito.php" con los datos recopilados
    $vistaCarrito = view('main/form/carrito', $datos);

    // Devolvemos la vista
    return $vistaCarrito;
}


/*   
    al usar el filtro de la vista se usa esta funcion 
    y se carga la vista con solo los productos del tipo
    seleccionado
*/
// Método para filtrar productos por tipo y cargar la vista
public function filtrarPorTipo($idTipo)
{
    // Instanciamos los modelos de Producto y Tipo
    $producto = new Producto();
    $tipo = new Tipo();

    // Obtenemos los productos filtrados por el tipo especificado
    $datos['productos'] = $producto->obtenerProductosPorTipo($idTipo);
    
    // Obtenemos los tipos de productos disponibles
    $datos['tipos'] = $tipo->tipoprod();
    
    // Almacenamos el tipo actual en los datos
    $datos['tipo_actual'] = $idTipo;

    // Cargamos las vistas de cabecera y pie de página
    $datos['cabecera'] = view('templates/cabecera');
    $datos['pie'] = view('templates/piepagina');

    // Cargamos la vista "carrito.php" con los datos recopilados
    $vistaCarrito = view('main/form/carrito', $datos);

    // Devolvemos la vista
    return $vistaCarrito;
}


   /**
 * Método para guardar productos en el carrito.
 */
public function guardar()
{
    // Obtener los datos del producto desde la segunda vista
    $id = $this->request->getVar('id_producto');
    $cantidad = $this->request->getVar('cantidad');
    
    // Obtener id_user desde la sesión
    $id_user = session('user')->id_user;

    // Crear una instancia del modelo que representa el carrito
    $carrito = new Carritos();
    
    // Verificar si el producto ya está en el carrito
    $producto_en_carrito = $carrito->verificarProductoEnCarrito($id, $id_user);

    if ($producto_en_carrito) {
        // Si el producto ya está en el carrito, actualizar la cantidad
        $nuevaCantidad = $producto_en_carrito['cantidad'] + $cantidad;

        // Actualizar la cantidad en el carrito
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

    // Obtener el tipo actual desde la solicitud
    $tipoActual = $this->request->getPost('tipo_actual');
    
    // Redirigir a la página correspondiente según el tipo actual
    if ($tipoActual) {
        return redirect()->to(base_url("carritop/$tipoActual"));
    } else {
        return redirect()->to('carrito');
    }
}

}
    