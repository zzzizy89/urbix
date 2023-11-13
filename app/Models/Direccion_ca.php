<?php 
namespace App\Models;

use CodeIgniter\Model;

class Direccion_ca extends Model{
    protected $table      = 'direccion_ca';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_direccion_casa';
     protected $allowedFields = ['id_barrio','calle','numero','descripcion_casa'];

     public function insertDireccion($calle,$numero,$descripcion_casa,$id_barrio)
    {
        $this->insert([
        'calle' => $calle,'numero' => $numero,'descripcion_casa' => $descripcion_casa,'id_barrio' => $id_barrio]);
        return $this->insertID();
    }
}