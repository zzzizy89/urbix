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

class Compradir extends Controller
{
    public function index()
    {
        $user = session('user');
    
        if (!$user || $user->id_user < 1) {
            return redirect()->to('login');
        } else {
            // Obtener el valor de totalCompra desde la sesión
            $totalCompra = session()->get('totalCompra');
    
            // Pasar el valor de totalCompra a la vista
            $data['totalC'] = $totalCompra;
    
            return view("main/form/compradir", $data);
        }
    }

    
public function Compradirtotal()
{
    $cantidad = $this->request->getVar('cantidad');
    $id_producto = $this->request->getVar('id_producto');
    
    
        $productoModel = new Producto();

        // Obtén el precio del producto desde la consulta
        $producto = $productoModel->obtenerPrecioPorId($id_producto);


        if ($producto !== null) {
            $precio = $producto['precio'];
            // Calcula el total de la compra
            $totalCompra = $cantidad * $precio;
            // Guardar el valor de totalCompra en la sesión
            session()->set('totalCompra', $totalCompra);
            session()->set('precio', $precio);
            session()->set('cantidad', $cantidad);
            session()->set('id_producto', $id_producto);

            return redirect()->to('compra_dir');
        } else {
            // Manejo de error si $producto es nulo
            return redirect()->to('carrito');
        }
    }

    
    public function Compradirecta($pais, $provincia, $ciudad, $barrio, $calle, $numero, $descripcion_casa)
{
    $paisModel = new Pais();
    $provModel = new Provincia();
    $ciudadModel = new Ciudad();
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

    // Obtener el ID de la dirección recién insertada
    
    $productoModel = new Producto();
    $comprasModel = new Compras();
    $detalleCompraModel = new Detalle_compra();

    // Obtener el usuario actual desde la sesión
    $user = session('user');
    $id_user = $user->id_user;

    $id_producto = session()->get('id_producto');
    $cantidad = session()->get('cantidad');
    $totalCompra = session()->get('totalCompra');
    $precio = session()->get('precio');
       
        // Inserta la compra
        $id_compra = $comprasModel->insertCompra($id_user,$id_direccion,$totalCompra);
        
        // Calcular el subtotal del producto
        $subtotal = $precio * $cantidad;

        // Registrar el detalle de la compra con el ID de compra correcto
        $detalleCompraModel->insertDetallecompra($id_compra,$id_producto,$cantidad,$precio,$subtotal);


      // Borrar sesiones específicas
        session()->remove('totalCompra');
        session()->remove('precio');
        session()->remove('cantidad');
        session()->remove('id_producto');

        // Redirigir a la página de confirmación de compra
        return redirect()->to(base_url('carrito'));
    
}
public function cancelcompradir()
{
    // Borrar sesiones específicas
    session()->remove('totalCompra');
    session()->remove('precio');
    session()->remove('cantidad');
    session()->remove('id_producto');

    // Redirigir a la página de confirmación de compra
    return redirect()->to(base_url('carrito'));
}
}