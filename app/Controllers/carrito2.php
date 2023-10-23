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
    
        // Obtener los datos del carrito y unirlos con los datos de los teclados
        $datos['carritos'] = $car->select('carrito.*, productos.nombre, productos.precio, productos.descripcion_prod, productos.imagen as producto_imagen, tipo.tipo as tipo_producto')
                                 ->join('productos', 'productos.id_producto = carrito.id_producto')
                                 ->join('tipo', 'productos.id_tipoprod = tipo.id_tipoprod')
                                 ->where('id_user', $id_user)
                                 ->orderBy('id_carrito', 'ASC')
                                 ->findAll();




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
        $datosCar = $car->where('id_carrito', $id)->first();
    
        // Eliminar el carrito por su ID
        $car->where('id_carrito', $id)->delete();
    
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
            $datosCar = $car->find($id_carrito);

            // Obtener el precio del producto desde la tabla productos
            $producto = $productosModel->find($datosCar['id_producto']); // Reemplaza 'ProductosModel' con el nombre real de tu modelo de productos
            $precio = $producto['precio'];

            // Calcular el nuevo total
            $nuevoTotal = $precio * $cantidad;

            // Actualizar la cantidad y el total en la base de datos
            $car->update($id_carrito, ['cantidad' => $cantidad, 'total' => $nuevoTotal]);
        }
    }

    // Redirigir a la vista carrito2
    return redirect()->to(base_url('carrito2'));
}

    
    
    

    
}