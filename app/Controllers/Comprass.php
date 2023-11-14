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


class Comprass extends Controller
{
    public function index() //carrito
    {
        $user = session('user');

        if (!$user || $user->id_user < 1) {
            return redirect()->to('login');
        } else {
            // Verificar si el carrito del usuario en sesión está vacío
            $carritosModel = new Carritos();
            $user = session('user');
            $id_user = $user->id_user;
            $carritoVacio = $carritosModel->isCarritoVacio($id_user);

            if ($carritoVacio) {
            // Si el carrito está vacío, establece un mensaje de sesión y redirige a carrito2
            session()->setFlashdata('message', 'Necesitas productos en el carrito para realizar una compra.');
            return redirect()->to(base_url('carrito2'));
            }

            // Calcular el total_c antes de cargar la vista
            $totalCompra = $this->calcularTotalCompra($id_user);

            // Pasar el valor de totalC a la vista
            $data['totalC'] = $totalCompra;

            // Cargar la vista "compras" con el valor de totalC
            return view('main/form/compras', $data);
        }
    }

    // Función para calcular el total de la compra
    private function calcularTotalCompra($id_user) //carrito
    {
        $carritosModel = new Carritos();
        $productoModel = new Producto();

        $totalCompra = 0;

        // Obtener los productos en el carrito
        $carritos = $carritosModel->obtenerCarritosPorUsuario($id_user);

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
public function confirmarCompra($pais, $provincia, $ciudad, $barrio, $calle, $numero, $descripcion_casa)
{
    $paisModel = new Pais();
    $provModel = new Provincia();
    $ciudadModel = new ciudad();
    $barrioModel = new Barrio();
    $direccionModel = new Direccion_ca();
   
     // Insertar país
     $id_pais = $paisModel->insertPais($pais);

     // Insertar provincia
     $id_provincia = $provModel->insertProvincia($id_pais, $provincia);
 
     // Insertar ciudad
     $id_ciudad = $ciudadModel->insertCiudad($ciudad,$id_provincia);
 
     // Insertar barrio
     $id_barrio = $barrioModel->insertBarrio($barrio,$id_ciudad);
 
     // Insertar dirección y guardar la id en $id_direccion
     $id_direccion = $direccionModel->insertDireccion($calle,$numero,$descripcion_casa,$id_barrio);
 
    $carritosModel = new Carritos();
    $productoModel = new Producto();
    $comprasModel = new Compras();
    $detalleCompraModel = new Detalle_compra();
    
    // Obtener el usuario actual desde la sesión
    $user = session('user');
    $id_user = $user->id_user;

// Calcular el total de la compra
$totalCompra = $this->calcularTotalCompra($id_user);

    // Obtener los productos en el carrito
    $carritos = $carritosModel->obtenerCarritosPorUsuario($id_user);

  // Inserta la compra
  $id_compra = $comprasModel->insertCompra($id_user,$id_direccion,$totalCompra);

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
        $detalleCompraModel->insertDetallecompra($id_compra,$id_producto,$cantidad,$precio,$subtotal);

        $id_carrito = $carrito['id_carrito'];
        // Eliminar el producto del carrito
        $carritosModel->eliminarCarrito($id_carrito);
    }
    
    // Redirigir a la página de confirmación de compra
    return redirect()->to(base_url('carrito2'));
    
}

}       