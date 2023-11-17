<?php 
namespace App\Models;

use CodeIgniter\Model;

class Carritos extends Model{
    protected $table      = 'carrito';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_carrito';
     protected $allowedFields = ['id_user','id_producto','cantidad'];


     public function verificarProductoEnCarrito($id_producto, $id_user) //catalogo
    {
        // Realiza la consulta para verificar si el producto ya está en el carrito
        return $this->where('id_producto', $id_producto)
                    ->where('id_user', $id_user)
                    ->first();
    }
    public function actualizarCantidadEnCarrito($id_carrito, $nuevaCantidad) //catalogo y carrito2
    {
        // Actualiza la cantidad del producto en el carrito
        $this->update($id_carrito, ['cantidad' => $nuevaCantidad]);
    }
    public function insertardatos($datos)
    {
        $this->insert($datos);
    }
    public function obtenerdatoscarrito($id_user) //carrito2 index
    {
                // Obtener los datos del carrito y unirlos con los datos de los teclados
                return $this->select('carrito.*, productos.nombre, productos.precio, productos.descripcion_prod, productos.imagen as producto_imagen, tipo.tipo as tipo_producto')
                ->join('productos', 'productos.id_producto = carrito.id_producto')
                ->join('tipo', 'productos.id_tipoprod = tipo.id_tipoprod')
                ->where('id_user', $id_user)
                ->orderBy('id_carrito', 'ASC')
                ->findAll();
    }
    public function obtenerDatosAntesDeEliminar($id_carrito)
    {
        // Obtén los datos del carrito antes de eliminarlo
        return $this->where('id_carrito', $id_carrito)->first();
    }

    public function eliminarCarrito($id_carrito)
    {
        // Eliminar el carrito por su ID
        return $this->where('id_carrito', $id_carrito)->delete();
    }
    public function obtenerDatosenelCarrito($id_carrito) //carrito2 funcion actualizarcar
    {
        // Obtén los datos del carrito por su ID
        return $this->find($id_carrito);
    }
    public function isCarritoVacio($id_user)
{
    // Verifica si el carrito está vacío para el usuario dado
    return $this->where('id_user', $id_user)->countAllResults() === 0;
}
public function obtenerCarritosPorUsuario($id_user)
{
    // Obtén los carritos para el usuario dado
    return $this->where('id_user', $id_user)->findAll();
}

public function datoscarritocompra($id_user)
{
    return $this->select('carrito.*, productos.nombre, productos.precio, productos.descripcion_prod, productos.imagen as producto_imagen, tipo.tipo as tipo_producto')
        ->join('productos', 'productos.id_producto = carrito.id_producto')
        ->join('tipo', 'productos.id_tipoprod = tipo.id_tipoprod')
        ->where('id_user', $id_user)
        ->orderBy('id_carrito', 'ASC')
        ->get()->getResult(); // Utiliza getResult() para obtener los resultados como un arreglo de objetos
}


}