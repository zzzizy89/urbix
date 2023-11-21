<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\Carritos;
use App\Models\Producto;


class Carrito2 extends Controller{
   /**
 * Método para mostrar el contenido del carrito.
 */
public function index()
{
    // Obtener la información del usuario desde la sesión
    $user = session('user');

    // Verificar si el usuario no está autenticado o tiene un ID de usuario no válido
    if (!$user || $user->id_user < 1) {
        // Redirigir al inicio de sesión si el usuario no está autenticado
        return redirect()->to('login');
    } else {
        // Crear una instancia del modelo que representa el carrito
        $carritoModel = new Carritos();
    
        // Obtener id_user desde la sesión
        $id_user = $user->id_user;
    
        // Llama al método del modelo para obtener los productos en el carrito
        $datos['carritos'] = $carritoModel->obtenerdatoscarrito($id_user);

        // Vistas de cabecera y pie de página
        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');
    
        // Cargar la vista "carrito2.php" con los datos obtenidos
        $vistaCarrito = view('main/form/carrito2', $datos);
    
        // Devolver la vista del carrito
        return $vistaCarrito;
    }
}

   /**
 * Método para eliminar un producto del carrito.
 *
 * @param int|null $id Identificador del carrito a eliminar.
 */
public function eliminarcar($id = null)
{
    // Crear una instancia del modelo que representa el carrito
    $carritoModel = new Carritos();
    
    // Obtener los datos del carrito antes de eliminarlo
    $datosCarrito = $carritoModel->obtenerDatosAntesDeEliminar($id);

    // Eliminar el carrito por su ID
    $carritoModel->eliminarCarrito($id);
    
    // Redirigir a la página del carrito
    return redirect()->to(site_url('/carrito2'));
}

/**
 * Método para actualizar la cantidad de productos en el carrito.
 */
public function actualizarcar()
{
    // Crear instancias de modelos necesarios
    $carritoModel = new Carritos();
    $productosModel = new Producto(); 

    // Obtener id_user desde la sesión
    $id_user = session('user')->id_user;

    // Obtener cantidades desde el formulario
    $cantidades = $this->request->getPost('cantidad');

    // Verificar si el carrito está vacío
    if (empty($cantidades)) {
        // Redirigir a la vista carrito2
        return redirect()->to(base_url('carrito2'));
    }

    foreach ($cantidades as $id_carrito => $cantidad) {
        // Validar que la cantidad sea un número entero positivo
        if (is_numeric($cantidad) && $cantidad > 0) {
            // Obtener los datos del carrito antes de actualizar
            $datosCarrito = $carritoModel->obtenerDatosEnElCarrito($id_carrito);

            // Actualizar la cantidad en el carrito
            $carritoModel->actualizarCantidadEnCarrito($id_carrito, $cantidad);
        }
    }

    // Redirigir a la vista carrito2
    return redirect()->to(base_url('carrito2'));
}


}