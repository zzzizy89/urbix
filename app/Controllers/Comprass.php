<?php 
namespace App\Controllers;
use App\Models\Compras;
use CodeIgniter\Controller;
use App\Models\Detalle_compra;
use App\Models\Direccion_ca;
use App\Models\Barrio;
use App\Models\ciudad;
use App\Models\pais;
use App\Models\provincia;
use App\Models\Carritos;
use App\Models\Producto;
use App\Models\Calle;

class Comprass extends Controller
{
  /**
 * Método para mostrar la página de compras.
 */
public function index()
{
    // Obtener el usuario desde la sesión
    $user = session('user');

    // Verificar si el usuario está autenticado y su ID es válido
    if (!$user || $user->id_user < 1) {
        // Si no está autenticado, redirigir al inicio de sesión
        return redirect()->to('login');
    } else {
        // Obtener el modelo del carrito
        $carritosModel = new Carritos();

        // Obtener el ID del usuario desde la sesión
        $id_user = $user->id_user;

        // Verificar si el carrito del usuario en sesión está vacío
        $carritoVacio = $carritosModel->isCarritoVacio($id_user);

        if ($carritoVacio) {
            // Si el carrito está vacío, establecer un mensaje de sesión y redirigir a carrito2
            session()->setFlashdata('message', 'Necesitas productos en el carrito para realizar una compra.');
            return redirect()->to(base_url('carrito2'));
        }
        $direc = new Direccion_ca();

        // Obtener los datos del carrito para la compra
        $data['carritos'] = $carritosModel->datoscarritocompra($id_user);

        // Calcular el total de la compra antes de cargar la vista
        $totalCompra = $this->calcularTotalCompra($id_user);

        $userData = $direc->getUserData($id_user);


        // Pasar el valor del total de la compra a la vista
        $data['totalC'] = $totalCompra;
        $data['userData'] = $userData;

        // Cargar la vista "compras" con el valor del total de la compra
        return view('main/form/compras', $data);
    }
}


    /**
 * Función para calcular el total de la compra en base a los productos en el carrito.
 *
 * @param int $id_user ID del usuario.
 *
 * @return float Total de la compra.
 */
private function calcularTotalCompra($id_user)
{
    // Instanciar modelos necesarios
    $carritosModel = new Carritos();
    $productoModel = new Producto();

    // Inicializar el total de la compra
    $totalCompra = 0;

    // Obtener los productos en el carrito del usuario
    $carritos = $carritosModel->obtenerCarritosPorUsuario($id_user);

    // Recorrer los productos en el carrito
    foreach ($carritos as $carrito) {
        // Obtener el ID del producto del carrito
        $id_producto = $carrito['id_producto'];

        // Obtener información del producto
        $producto = $productoModel->obtenerProductoPorId($id_producto);

        // Calcular el subtotal del producto
        $subtotal = $producto['precio'] * $carrito['cantidad'];

        // Sumar el subtotal al total de la compra
        $totalCompra += $subtotal;
    }

    return $totalCompra;
}



public function cancelar()
    {
        return view('main/form/carrito2');
}

public function check()
    {
        return view('main/catalogo/checkout');
}

public function confirmarCompra($pais, $provincia, $ciudad, $codigo_postal, $barrio, $calle, $numero, $descripcion_casa)
{
    // Instanciar modelos para manipular la base de datos
    $paisModel = new Pais();
    $provModel = new Provincia();
    $ciudadModel = new Ciudad();
    $barrioModel = new Barrio();
    $direccionModel = new Direccion_ca();
    $calleModel = new Calle();
    $carritosModel = new Carritos();
    $productoModel = new Producto();
    $comprasModel = new Compras();
    $detalleCompraModel = new Detalle_compra();

    // Insertar país
    $id_pais = $paisModel->insertPais($pais);

    // Insertar provincia
    $id_provincia = $provModel->insertProvincia($id_pais, $provincia);

    // Insertar ciudad
    $id_ciudad = $ciudadModel->insertCiudad($ciudad, $id_provincia);

    // Insertar barrio
    $id_barrio = $barrioModel->insertBarrio($barrio, $id_ciudad);

    // Insertar calle
    $id_calle = $calleModel->insertCalle($calle);

     // Obtener el usuario actual desde la sesión
    $user = session('user');
    $id_user = $user->id_user;

    // Insertar dirección y guardar la id en $id_direccion
    $id_direccion = $direccionModel->insertDireccion($id_calle, $codigo_postal,$id_user, $numero, $descripcion_casa, $id_barrio);

   
    

    // Calcular el total de la compra
    $totalCompra = $this->calcularTotalCompra($id_user);

    // Obtener los productos en el carrito
    $carritos = $carritosModel->obtenerCarritosPorUsuario($id_user);

    // Insertar la compra
    $id_compra = $comprasModel->insertCompra($id_user, $id_direccion, $totalCompra);

    // Procesar cada producto en el carrito
    foreach ($carritos as $carrito) {
        // Obtener el ID del producto del carrito
        $id_producto = $carrito['id_producto'];

        // Obtener información del producto
        $producto = $productoModel->obtenerProductoPorId($id_producto);

        $cantidad = $carrito['cantidad'];
        $precio = $producto['precio'];

        // Calcular el subtotal del producto
        $subtotal = $precio * $cantidad;

        // Registrar el detalle de la compra con el ID de compra correcto
        $detalleCompraModel->insertDetallecompra($id_compra, $id_producto, $cantidad, $precio, $subtotal);

        $id_carrito = $carrito['id_carrito'];
        // Eliminar el producto del carrito
        $carritosModel->eliminarCarrito($id_carrito);
    }

    // Redirigir a la página de confirmación de compra
    return redirect()->to(base_url('carrito2'));
}


}       