<?php 
namespace App\Models;

use CodeIgniter\Model;

class Detalle_compra extends Model{
    protected $table      = 'detalle_compra';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_dcompra';
     protected $allowedFields = ['id_compras','id_producto','cantidad','precio_unitario','subtotal'];

     public function insertDetallecompra($id_compra,$id_producto,$cantidad,$precio,$subtotal)
    {
        return $this->insert([
            'id_compras' => $id_compra,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            'precio_unitario' => $precio,
            'subtotal' => $subtotal
        ]);
    }
}