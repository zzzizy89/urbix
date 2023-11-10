<?php 
namespace App\Models;

use CodeIgniter\Model;

class Carritos extends Model{
    protected $table      = 'carrito';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_carrito';
     protected $allowedFields = ['id_user','id_producto','cantidad'];


     public function verificarProductoEnCarrito($id_producto, $id_user)
    {
        // Realiza la consulta para verificar si el producto ya está en el carrito
        return $this->where('id_producto', $id_producto)
                    ->where('id_user', $id_user)
                    ->first();
    }
    public function actualizarCantidadEnCarrito($id_carrito, $nuevaCantidad)
    {
        // Actualiza la cantidad del producto en el carrito
        $this->update($id_carrito, ['cantidad' => $nuevaCantidad]);
    }
    public function insertardatos($datos)
    {
        $this->insert($datos);
    }
}