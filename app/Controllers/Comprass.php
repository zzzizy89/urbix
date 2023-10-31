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
    public function index()
    {
        $user = session('user');

        if (!$user || $user->id_user < 1) {
            return redirect()->to('login');
        } else {
            // Verificar si el carrito del usuario en sesión está vacío
            $carritosModel = new Carritos();
            $user = session('user');
            $id_user = $user->id_user;
            $carritoVacio = $carritosModel->where('id_user', $id_user)->countAllResults() === 0;

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
    private function calcularTotalCompra($id_user)
    {
        $carritosModel = new Carritos();
        $productoModel = new Producto();

        $totalCompra = 0;

        // Obtener los productos en el carrito
        $carritos = $carritosModel->where('id_user', $id_user)->findAll();

        foreach ($carritos as $carrito) {
            // Obtener información del producto
            $producto = $productoModel->find($carrito['id_producto']);

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
    public function confirmarCompra()
    {
        $paisModel = new Pais();
        $provModel = new Provincia();
        $ciudadModel = new ciudad();
        $barrioModel = new Barrio();
        $direccionModel = new Direccion_ca();
       

        // Obtener los datos del formulario
        $pais = $this->request->getPost('pais');
        $provincia = $this->request->getPost('provincia');
        $ciudad = $this->request->getPost('ciudad');
        $barrio = $this->request->getPost('barrio');
        $calle = $this->request->getPost('calle');
        $numero = $this->request->getPost('numero');
        $descripcion_casa = $this->request->getPost('descripcion_casa');

        $id_pais= $paisModel->insert(['pais' => $pais]);
        $id_provincia= $provModel->insert(['provincia' => $provincia,'id_pais'=>$id_pais]);
        $id_ciudad= $ciudadModel->insert(['ciudad' => $ciudad,'id_prov'=>$id_provincia]);
        $id_barrio= $barrioModel->insert(['barrio' => $barrio,'id_ciudad'=>$id_ciudad]);

        $direccionModel->insert([   
            'calle'=>$calle,
            'numero'=>$numero,
            'descripcion_casa'=>$descripcion_casa,
            'id_barrio'=>$id_barrio
        ]);

    // Obtener el ID de la dirección recién insertada
        $id_direccion = $direccionModel->getInsertID();

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
        $carritos = $carritosModel->where('id_user', $id_user)->findAll();
    
        $id_compra = $comprasModel->insert([
            'id_user' => $id_user,
            'id_metodo_pago' => 1, // ID del método de pago (ajusta según tus necesidades)
            'id_direccion_casa' => $id_direccion, // ID de la dirección (ajusta según tus necesidades)
            'total_c' => $totalCompra, // Total inicializado en 0
            'fecha_compra' => date('Y-m-d H:i:s') // Fecha y hora actual
        ]);

        foreach ($carritos as $carrito) {
            // Obtener información del producto
            $producto = $productoModel->find($carrito['id_producto']);
    
            // Calcular el subtotal del producto
            $subtotal = $producto['precio'] * $carrito['cantidad'];
    
            // Registrar el detalle de la compra con el ID de compra correcto
            $detalleCompraModel->insert([
                'id_compras' => $id_compra, // Usar el ID de compra generado
                'id_producto' => $carrito['id_producto'],
                'cantidad' => $carrito['cantidad'],
                'precio_unitario' => $producto['precio'],
                'subtotal' => $subtotal
            ]);
    
            // Eliminar el producto del carrito
            $carritosModel->delete($carrito['id_carrito']);
        }
        
        // Actualizar el total en la compra con el valor calculado
            $comprasModel->update($id_compra, ['total_c' => $totalCompra]);

        // Redirigir a la página de confirmación de compra
        return redirect()->to(base_url('carrito2'));
        
}
}