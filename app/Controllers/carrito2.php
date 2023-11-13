<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\Carritos;
use App\Models\Producto;


class Carrito2 extends Controller{
    public function index()

    {
        $user = session('user');

        if (!$user || $user->id_user < 1) {
            return redirect()->to('login');
        } else {
            
        $car = new Carritos();
    
        // Obtener id_user desde la sesión
        $id_user = session('user')->id_user;
    
       // Llama al método del modelo para obtener los productos en el carrito
         $datos['carritos'] = $car->obtenerdatoscarrito($id_user);

        $datos['cabecera'] = view('templates/cabecera');
        $datos['pie'] = view('templates/piepagina');
    
        $vistaCarrito = view('main/form/carrito2', $datos);
    
        return $vistaCarrito;
    }
    
}
    public function eliminarcar($id = null)
    {
        $car = new Carritos();
    
        // Obtener los datos del carrito antes de eliminarlo
        $datosCar = $car->obtenerDatosAntesDeEliminar($id);

        // Eliminar el carrito por su ID
        $car->eliminarCarrito($id);
    
        // Redirigir a la página del carrito
        return $this->response->redirect(site_url('/carrito2'));
    }
    public function actualizarcar()
{
    $car = new Carritos();
    $productosModel = new Producto(); 
    
    // Obtener id_user desde la sesión
    $id_user = session('user')->id_user;

    // Obtener datos del formulario
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
            $datosCar = $carritoModel->obtenerDatosenelCarrito($id_carrito);

            // Actualizar la cantidad 
            $carritoModel->actualizarCantidadEnCarrito($id_carrito, $cantidad);
        }
    }

    // Redirigir a la vista carrito2
    return redirect()->to(base_url('carrito2'));
}

}