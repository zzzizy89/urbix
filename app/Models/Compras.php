<?php 
namespace App\Models;

use CodeIgniter\Model;

class Compras extends Model{
    protected $table      = 'compras';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_compras';
     protected $allowedFields = ['id_carrito','id_metodo_pago','id_direccion_casa','fecha_compra'];

    protected $useTimestamps = false;
    protected $createdField = 'fecha_compra';
}