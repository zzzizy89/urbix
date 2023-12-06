<?php 
namespace App\Controllers;
use App\Models\Compras;
use CodeIgniter\Controller;
use App\Models\Detalle_compra;
use App\Models\Direccion_ca;
use App\Models\Barrio;
use App\Models\Ciudad;
use App\Models\Pais;
use App\Models\Provincia;
use App\Models\Producto;
use App\Models\Calle;

class Compradir extends Controller
{
   /**
 * Método para mostrar la página principal del proceso de compra.
 */
public function index()
    {
        $direc = new Direccion_ca();
        // Verificar si el usuario está autenticado y tiene un ID válido
        $user = session('user');
        $compra = session('totalCompra');

        if (!$user || $user->id_user < 1) {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            return redirect()->to('login');
        } 
            // verifica si la session esta vacia
             if(!$compra)
                 {
                 return redirect()->back()->withInput();
            }else
                {
                    // Obtener el valor de totalCompra desde la sesión
                    $totalCompra = session()->get('totalCompra');

                    $id_user = $user->id_user;

                    // Obtener los datos del usuario de la base de datos
                    $userData = $direc->getUserData($id_user);
                    // Pasar los valores de totalCompra y userData a la vista
                    $data['totalC'] = $totalCompra;
                    $data['userData'] = $userData;

                    // Cargar la vista para la página principal del proceso de compra

                    return view("main/form/compradir", $data);
                }
    }

    
/**
 * Método para procesar la compra total de productos.
 */
public function Compradirtotal()
{
    // Obtener la cantidad y el ID del producto desde la solicitud
    $cantidad = $this->request->getVar('cantidad');
    $id_producto = $this->request->getVar('id_producto');

    // Crear una instancia del modelo de Producto
    $productoModel = new Producto();

    // Obtener información del producto por su ID
    $producto = $productoModel->obtenerProductoPorId($id_producto);

    if ($producto !== null) {
        // Obtener el precio, nombre y calcular el total de la compra
        $precio = $producto['precio'];
        $nombre = $producto['nombre'];
        $totalCompra = $cantidad * $precio;

        // Guardar los valores relevantes en la sesión
        session()->set('totalCompra', $totalCompra);
        session()->set('precio', $precio);
        session()->set('cantidad', $cantidad);
        session()->set('nombre', $nombre);
        session()->set('id_producto', $id_producto);

        // Redirigir a la página de compra
        return redirect()->to('compra_dir');
    } else {
        // Manejo de error si $producto es nulo, redirigir al carrito
        return redirect()->to('carrito');
    }
}


    
   /**
 * Método para procesar la compra directa.
 *
 * @param string $pais País de la dirección.
 * @param string $provincia Provincia de la dirección.
 * @param string $ciudad Ciudad de la dirección.
 * @param string $codigo_postal Código postal de la dirección.
 * @param string $barrio Barrio de la dirección.
 * @param string $calle Calle de la dirección.
 * @param string $numero Número de la dirección.
 * @param string $descripcion_casa Descripción adicional de la dirección.
 */
public function Compradirecta($pais, $provincia, $ciudad, $codigo_postal, $barrio, $calle, $numero, $descripcion_casa)
{
    // Crear instancias de los modelos necesarios
    $paisModel = new Pais();
    $provModel = new Provincia();
    $ciudadModel = new Ciudad();
    $barrioModel = new Barrio();
    $direccionModel = new Direccion_ca();
    $calleModel = new Calle();
    $productoModel = new Producto();
    $comprasModel = new Compras();
    $detalleCompraModel = new Detalle_compra();

    // Insertar país y obtener su ID
    $id_pais = $paisModel->insertPais($pais);

    // Insertar provincia y obtener su ID
    $id_provincia = $provModel->insertProvincia($id_pais, $provincia);

    // Insertar ciudad y obtener su ID
    $id_ciudad = $ciudadModel->insertCiudad($ciudad, $id_provincia);

    // Insertar barrio y obtener su ID
    $id_barrio = $barrioModel->insertBarrio($barrio, $id_ciudad);

    // Insertar calle y obtener su ID
    $id_calle = $calleModel->insertCalle($calle);

    // Obtener el usuario actual desde la sesión
    $user = session('user');
    $id_user = $user->id_user;

    // Insertar dirección y obtener su ID
    $id_direccion = $direccionModel->insertDireccion($id_calle, $codigo_postal,$id_user, $numero, $descripcion_casa, $id_barrio);

 

    // Obtener información de la compra desde las sesiones
    $id_producto = session()->get('id_producto');
    $cantidad = session()->get('cantidad');
    $totalCompra = session()->get('totalCompra');
    $precio = session()->get('precio');
    $nombre = session()->get('nombre');

    // Insertar la compra y obtener su ID
    $id_compra = $comprasModel->insertCompra($id_user, $id_direccion, $totalCompra);

    // Calcular el subtotal del producto
    $subtotal = $precio * $cantidad;

    // Registrar el detalle de la compra con el ID de compra correcto
    $detalleCompraModel->insertDetallecompra($id_compra, $id_producto, $cantidad, $precio, $subtotal);

    // Borrar sesiones específicas
    session()->remove('totalCompra');
    session()->remove('precio');
    session()->remove('cantidad');
    session()->remove('id_producto');
    session()->remove('nombre');

    // Redirigir a la página de confirmación de compra
    return redirect()->to(base_url('carrito'));
}

/**
 * Método para cancelar la compra directa.
 */
public function cancelcompradir()
{
    // Borrar sesiones específicas
    session()->remove('totalCompra');
    session()->remove('precio');
    session()->remove('cantidad');
    session()->remove('id_producto');
    session()->remove('nombre');

    // Redirigir a la página del carrito
    return redirect()->to(base_url('carrito'));
}

}