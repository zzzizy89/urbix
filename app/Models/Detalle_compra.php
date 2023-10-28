<?php 
namespace App\Models;

use CodeIgniter\Model;

class Compras extends Model{
    protected $table      = 'detalle_compra';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_dcompra';
     protected $allowedFields = ['id_compras','id_producto','cantidad','precio_unitario'];
}