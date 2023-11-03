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
use App\Models\Producto;


class Compradir extends Controller
{
    public function index() //carrito
    {
        $user = session('user');

        if (!$user || $user->id_user < 1) {
            return redirect()->to('login');
        } else {
            $id = $this->request->getVar('id_producto');
            $cantidad = $this->request->getVar('cantidad');
            $productoModel = new Producto();
    
    // Obtén el precio del producto desde la consulta
    $producto = $productoModel
        ->select('precio')
        ->where('id_producto', $id)
        ->first(); 
    
        $precio = $producto['precio'];
        
        // Calcula el total de la compra
        $totalCompra = $cantidad * $precio;
            // Calcular el total_c antes de cargar la vista
            $totalCompra = $this->calcularTotalCompra();

            // Pasar el valor de totalC a la vista
            $data['totalC'] = $totalCompra;

            // Cargar la vista "compras" con el valor de totalC
            return view('main/form/compras', $data);
        }
    }
    
public function Compradir($parametro1, $parametro2, $parametro3, $parametro4, $parametro5, $parametro6, $parametro7)
{
    $paisModel = new Pais();
    $provModel = new Provincia();
    $ciudadModel = new ciudad();
    $barrioModel = new Barrio();
    $direccionModel = new Direccion_ca();
   

    // Obtener los datos del formulario
    $pais = $parametro1;
    $provincia = $parametro2;
    $ciudad = $parametro3;
    $barrio = $parametro4;
    $calle =  $parametro5;
    $numero = $parametro6;
    $descripcion_casa = $parametro7;

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
}
}