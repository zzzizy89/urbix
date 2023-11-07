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
        $producto = $productoModel
        ->select('precio')
        ->where('id_producto', $id_producto)
        ->first();

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

    
    public function Compradirecta($parametro1, $parametro2, $parametro3, $parametro4, $parametro5, $parametro6, $parametro7)
{
    
    $paisModel = new Pais();
    $provModel = new Provincia();
    $ciudadModel = new Ciudad();
    $barrioModel = new Barrio();
    $direccionModel = new Direccion_ca();

    // Obtener los datos del formulario
    $pais = $parametro1;
    $provincia = $parametro2;
    $ciudad = $parametro3;
    $barrio = $parametro4;
    $calle = $parametro5;
    $numero = $parametro6;
    $descripcion_casa = $parametro7;

    $id_pais = $paisModel->insert(['pais' => $pais]);
    $id_provincia = $provModel->insert(['provincia' => $provincia, 'id_pais' => $id_pais]);
    $id_ciudad = $ciudadModel->insert(['ciudad' => $ciudad, 'id_prov' => $id_provincia]);
    $id_barrio = $barrioModel->insert(['barrio' => $barrio, 'id_ciudad' => $id_ciudad]);

    $direccionModel->insert([
        'calle' => $calle,
        'numero' => $numero,
        'descripcion_casa' => $descripcion_casa,
        'id_barrio' => $id_barrio
    ]);

    // Obtener el ID de la dirección recién insertada
    $id_direccion = $direccionModel->getInsertID();

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
        $id_compra = $comprasModel->insert([
            'id_user' => $id_user,
            'id_metodo_pago' => 1, // ID del método de pago (ajusta según tus necesidades)
            'id_direccion_casa' => $id_direccion, // ID de la dirección (ajusta según tus necesidades)
            'total_c' => $totalCompra,
            'fecha_compra' => date('Y-m-d H:i:s') // Fecha y hora actual
        ]);
        
        // Calcular el subtotal del producto
        $subtotal = $precio * $cantidad;

        // Registrar el detalle de la compra con el ID de compra correcto
        $detalleCompraModel->insert([
            'id_compras' => $id_compra,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            'precio_unitario' => $precio,
            'subtotal' => $subtotal
        ]);

        // Actualizar el total en la compra con el valor calculado
        $comprasModel->update($id_compra, ['total_c' => $totalCompra]);

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