<?php 
namespace App\Models;

use CodeIgniter\Model;

class Compras extends Model{
    protected $table      = 'compras';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_compras';
     protected $allowedFields = ['id_user','id_metodo_pago','id_direccion_casa','total_c','fecha_compra'];

    protected $useTimestamps = false;
    protected $createdField = 'fecha_compra';

    public function insertCompra($id_user,$id_direccion,$totalCompra)
    {
        return $this->insert([
            'id_user' => $id_user,
            'id_metodo_pago' => 1, // ID del método de pago (ajusta según tus necesidades)
            'id_direccion_casa' => $id_direccion, // ID de la dirección (ajusta según tus necesidades)
            'total_c' => $totalCompra,
            'fecha_compra' => date('Y-m-d H:i:s') // Fecha y hora actual
        ]);
    }
}