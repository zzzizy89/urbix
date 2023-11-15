<?php 
namespace App\Models;

use CodeIgniter\Model;

class Ciudad extends Model{
    protected $table      = 'ciudad';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_ciudad';
     protected $allowedFields = ['id_prov','ciudad'];


     public function insertCiudad($ciudad,$id_provincia)
     {
        return $this->insert(['ciudad' => $ciudad, 'id_prov' => $id_provincia]);
     }
}